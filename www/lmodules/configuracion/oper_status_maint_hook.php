<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "../monitoreos/inc_circuitos.php";

class coper_status_m_hooks extends cclass_maint_hooks
{

	public function afterLoadForm()
	{
		global $primary_db, $sess;
		$res = array();
		$obj = $this->m_data;
		$this->m_resultado = array();
		$this->cantidad = 0;
		if(!$obj) {
			$msg= "MENSAJE: No esta definido el contenido...";
			$res[]= $msg;
			return $res;
		}
		$sql = "select * from circuitos where cir_status='ACTIVO'";
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar un circuitos.";
				return $res;
		}		
		$i=0;
		if ($row = $primary_db->_fetch_row($out))
		{		       
				$i++;
				$obj->getField("cir_code")->setValue($row["cir_code"]);
				$obj->getField("cir_date_ini")->setValue($row["cir_date_ini"]);
				$obj->getField("cir_date_fin")->setValue($row["cir_date_fin"]);		
				$obj->getField("cir_importance_min")->setValue($row["cir_importance_min"]);
				$obj->getField("cir_status")->setValue($row["cir_status"]);				
		}
        else
		{
				$obj->getField("cir_status")->setValue("No hay circuito Activo");	
		}		
		return $res;
	}

	public function beforeSaveDB()
	{
		global $primary_db,$sess;
		$content = array();
		$res = array();
		$obj = $this->m_data;
        if (!$obj) {
            $msg = "MENSAJE: No esta definido el contenido...";
            $res[] = $msg;
            return $res;
        }
		$frm = $obj->m_parent;
		if (!( isset($frm) && $frm->m_OP=="S" ))  return $res;		
		$OP = $frm->m_op_ant;	

		// Actualizo
		$use_code = intval($obj->getField("use_code")->getValue());
		$cir_code = intval($obj->getField("cir_code")->getValue());
		$oper_grupo = $obj->getField("oper_grupo")->getValue();
		$modificar_circuito = $obj->getField("modificar_circuito")->getValue();
		$crit_status = $obj->getField("crit_status")->getValue();

		
		if (($modificar_circuito=="SI") && ($cir_code==0) )
		{
				$res[] = "MENSAJE: No se puede asignar al circuito, ya que no hay circuito activo.";	
				return $res;
		}		
		if (($modificar_circuito=="SI") && ($cir_code>0) )
		{
			$sql = "select cir_status,DATE_FORMAT(cir_date_ini,'%d/%m/%Y') as cir_date_ini,DATE_FORMAT(cir_date_fin,'%d/%m/%Y') as cir_date_fin FROM circuitos  where cir_code=".$cir_code;
			$out2 = $primary_db->do_execute($sql, $err2);
			if (count($err2) != 0){
				$res[] = "MENSAJE: No se encontro el circuito.";	
				return $res;
			}	
			if ($row2 = $primary_db->_fetch_row($out2))
			{
				$cir_date_ini = $row2["cir_date_ini"];
				$cir_date_fin = $row2["cir_date_fin"];
				$cir_status =  $row2["cir_status"];
			} else {
				$res[] = "MENSAJE: No se encontr� el circuito.";	
				return $res;
			}	

			$fecha1	=  $primary_db->QueryString("select DATE_FORMAT(mon_date_aprox,'%d/%m/%Y') from monitoreos where cir_code=".$cir_code." and mon_date_aprox >= date(now()) order by mon_date_aprox limit 1");
			if ($fecha1 == "") $fecha1 = date("d/m/Y"); 
					  
			$cirg_code_act = $primary_db->QueryString("select cirg_code from cir_groups where oper_grupo='$oper_grupo' and cir_code=".$cir_code);	
			if ($cirg_code_act == "")
			{
				$res[] = "MENSAJE: El grupo seleccionado no esta asignado al circuito activo. Asigne el grupo al circuito si desea incorporar al operador";	
				return $res;
			}	
			$use_code_supervisor = $primary_db->QueryString("select use_code_supervisor from cir_groups where cirg_code='$cirg_code_act' and cir_code=".$cir_code);	
			if ($use_code_supervisor == "")
			{
				$res[] = "MENSAJE: El grupo seleccionado no tiene asignado un supervisor en el circuito activo. Asigne el grupo al circuito correctamente si desea incorporar al operador";	
				return $res;
			}	
		
			if ($OP == "N")
			{
			  // insertar monitoreos

			       $error = insertar_operador_en_circuito($cir_code,$oper_grupo,$use_code_supervisor,$use_code,$crit_status,$fecha1,$cir_date_fin);
				   if ($error != "") $res[] = "MENSAJE: ".$error;
			}
			else
			{    // Es modifcacion
				// Me fijo si el operador ya esta en este circuito
				   $cant =  $primary_db->QueryString("select count(*) from monitoreos  where cir_code = $cir_code and use_code_operador = $use_code"  );
				   if (intval($cant) > 0)
				   {
				       $oper_grupo_ant =  $primary_db->QueryString("select oper_grupo from oper_status  where use_code = $use_code" );
				       $error = mover_operador_en_circuito($cir_code,$oper_grupo_ant,$oper_grupo,$use_code);
					   if ($error != "") $res[] = "MENSAJE: ".$error;
				   }else{
						$error = insertar_operador_en_circuito($cir_code,$oper_grupo,$use_code_supervisor,$use_code,$crit_status,$fecha1,$cir_date_fin);
						if ($error != "") $res[] = "MENSAJE: ".$error;
				   }
		    }
		}	
		return $res;
	}	

	
}


?>	
