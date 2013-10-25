<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "inc_circuitos.php";

class cmon_iniciar_circuito_hooks extends cclass_maint_hooks
{

	public function canSaveDB()
	{
		return false;
	}
	public function canLoadDB()
	{
		return false;
	}
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
		if ($row = $primary_db->_fetch_row($out))
		{		    
           	
			$res = cerrarCircuito($row["cir_code"]);
			if (count($res) > 0)	return $res;
		}
		
		$sql = "select * from circuitos where cir_date_ini<=date(now()) and cir_date_fin>=date(now()) and cir_status='PENDIENTE'";
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar un circuitos.";
				return $res;
		}	
		$i=0;
		while ($row = $primary_db->_fetch_row($out))
		{		$i++;
				$obj->getField("cir_code")->setValue($row["cir_code"]);
				$obj->getField("cir_date_ini")->setValue($row["cir_date_ini"]);
				$obj->getField("cir_semanas")->setValue($row["cir_semanas"]);			
				$obj->getField("cir_date_fin")->setValue($row["cir_date_fin"]);		
				$obj->getField("cir_importance_min")->setValue($row["cir_importance_min"]);
				$obj->getField("cir_status")->setValue($row["cir_status"]);				
		}

		if ($i==0)
		{
				$res[] = "MENSAJE: No hay un circuito Pendiente para la fecha actual, ingreselo.";
				return $res;
		}		
		if ($i>1)
		{
				$res[] = "MENSAJE: Hay mas de un circuito Pendiente para la fecha actual, anule los que correspondan.";
				return $res;
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

		$cir_code = $obj->getField("cir_code")->getValue();
		$sql = "select  cir_status,DATE_FORMAT(cir_date_ini,'%d/%m/%Y') as cir_date_ini,DATE_FORMAT(cir_date_fin,'%d/%m/%Y') as cir_date_fin FROM circuitos 
		              where cir_code=".$cir_code;
		
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar un circuitos.";
				return $res;
		}	
		if ($row = $primary_db->_fetch_row($out))
		{	
			$cir_status =  $row["cir_status"];
			if ($cir_status != 'PENDIENTE')
			{
				$res[] = "MENSAJE: Solo se pueden actualizar circuitos con estado PENDIENTE.";
			}
			else
			{

			   $res = iniciarCircuito($cir_code,$row["cir_date_ini"],$row["cir_date_fin"]);
			}
		}
		else
		{
			$res[] = "MENSAJE: Error al buscar un circuitos.";
		}
		return $res;
	}	
	
}


?>	
