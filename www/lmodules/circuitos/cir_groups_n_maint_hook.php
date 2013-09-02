<?php
include_once "funciones/validar.php";
include_once "../monitoreos/inc_circuitos.php";
class ccir_groups_n_hooks extends cclass_maint_hooks
{
	public function canSaveDB()
	{
		return false;
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

		if (!( isset($frm) && ($frm->m_OP=="S" || $frm->m_OP=="M" || $frm->m_OP=="B" ||$frm->m_OP=="N"))) 
		                return $res;

		$cir_code = $obj->getField("cir_code")->getValue();
		$sql2 = "select DATE_FORMAT(cir_date_ini, '%d/%m/%Y') as cir_date_ini, DATE_FORMAT(cir_date_fin, '%d/%m/%Y') as cir_date_fin,cir_status  from circuitos where cir_code=".$cir_code;	
		$out2 = $primary_db->do_execute($sql2, $err2);
		if (count($err2) != 0)
			$res[] = "MENSAJE: Error al buscar el circuito.";
		elseif ($row2 = $primary_db->_fetch_row($out2))
		{
	   		$cir_date_ini = $row2["cir_date_ini"];
			$cir_date_fin = $row2["cir_date_fin"];
			$cir_status =  $row2["cir_status"];
			if ( ($cir_status != 'PENDIENTE') && ($cir_status != 'ACTIVO'))
				$res[] = "MENSAJE: Solo se pueden actualizar circuitos con estado PENDIENTE o ACTIVO.";
		} else
			$res[] = "MENSAJE: No se encontró el circuito.";
		
		if (count($res) > 0) return $res;
		
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$oper_grupo = $obj->getField("oper_grupo")->getValue();
		$cirg_code =  $primary_db->QueryString("SELECT cirg_code FROM cir_groups where cir_code=".$cir_code." and oper_grupo='".$oper_grupo."' limit 1");
		if ($cirg_code != '')
		{
				$res[] = "MENSAJE: Ya existe un grupo para ese grupo de operadores en el circuito.";
				return $res;
		}
		$primary_db->beginTransaction();
		$cirg_code = $primary_db->Sequence("cir_groups");
		$sql = "insert into cir_groups (cirg_code,cir_code,use_code_supervisor,oper_grupo) values ($cirg_code,$cir_code,$use_code_supervisor,'$oper_grupo')";
		$out2 = $primary_db->do_execute($sql, $err2);
		if (count($err2) != 0)
			$error = "Error al insertar el grupo en el circuito $cir_code.";
  
		
		if ( $cir_status == 'ACTIVO')
		{
			// Controlar que los conceptos no esten repetidos
			$i=0;	
			foreach($obj->m_childs['oper_status'] as $o)
			{
				$i++;
				$use_code_operador = $o->getField("use_code")->getValue();		
				$crit_status = $o->getField("crit_status")->getValue();	
			   
			    $cant =  $primary_db->QueryString("select count(*) from monitoreos  where cir_code = $cir_code and use_code_operador = $use_code_operador"  );
				if (intval($cant) > 0)
				{
				       $oper_grupo_ant =  $primary_db->QueryString("select oper_grupo from oper_status  where use_code = $use_code_operador" );
				       $error = mover_operador_en_circuito($cir_code,$oper_grupo_ant,$oper_grupo,$use_code_operador);
					   if ($error != "") $res[] = "MENSAJE: ".$error;
				}else{
				   // Insertar Monitoreos
						$error = insertar_operador_en_circuito($cir_code,$oper_grupo,$use_code_supervisor,$use_code_operador,$crit_status,$cir_date_ini,$cir_date_fin);
						if ($error != "") $res[] = "MENSAJE: ".$error;
				}
				   
			}
		}
		if (count($res) == 0)
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();			
		return $res;
	}	
}


?>	
