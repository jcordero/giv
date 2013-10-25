<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "inc_circuitos.php";
class cmonitoreos_superv_hooks extends cclass_maint_hooks
{	
	public function canSaveDB()
	{
		return false;
	}
	public function afterLoadDB()
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
		/*
		$mon_status=$obj->getField("mon_status")->getValue();
		if ($mon_status != 'PENDIENTE')
		{
			$res[]= "MENSAJE: El monitoreo tiene estado $mon_status";		
			return $res;
		}
		*/		
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

		$mon_code=$obj->getField("mon_code")->getValue();
		$cir_code = $obj->getField("cir_code")->getValue();
		// $cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		$mon_motivo=$obj->getField("mon_motivo")->getValue();
		$mon_status=$obj->getField("mon_status")->getValue();
		$mon_add_mon = intval($obj->getField("mon_add_mon")->getValue());
		$mon_add_cap = intval($obj->getField("mon_add_cap")->getValue());	
		$mon_date_aprox = $obj->getField("mon_date_aprox")->getValue();
		$mon_date_aprox = $obj->getField("mon_date")->getValue();
		/*
		if ($mon_status != 'PENDIENTE')
		{
			$res[]= "MENSAJE: El monitoreo tiene estado $mon_status";		
			return $res;
		}
		*/
		$obj->getField("mon_status")->setValue("CERRADO");
		$obj->getField("mon_forzado")->setValue("SI");
		$obj->getField("mon_aprobo")->setValue("NO");
		$obj->getField("mon_puntaje")->setValue("0");	
		$obj->getField("mon_perjuicio_cliente")->setValue("NO");
		$primary_db->beginTransaction();		
		$sql = "update monitoreos set mon_forzado='SI', mon_motivo='".$mon_motivo."', mon_date= now(),mon_add_mon=0,mon_add_cap=0, ";
		$sql.= "mon_aprobo='NO',mon_puntaje=0,mon_perjuicio_cliente='NO',mon_status='CERRADO',mon_use_code=".$sess->user_id;
		$sql.= " where mon_code=".$mon_code;
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) 
			$res[]= "MENSAJE: Error al actualizar el operador monitoreo";
			
		else
		{
			if ($mon_add_cap > 0) 
			{
			   $error = del_capacitacion($cir_code,$mon_code, $use_code_operador, $mon_add_cap);
			   if ($error != "") 
				   $res[] = "MENSAJE: Error al eliminar Capacitaciones Agregadas";	
			}


			if ($mon_add_mon > 0) 
			{
			   $error = del_monitoreo($cir_code,$mon_date_aprox, $use_code_operador, $mon_add_mon);
			   if ($error != "") 
				   $res[] = "MENSAJE: Error al eliminar Monitoreos Agregados";	
			}
		}	
		if (count($res) == 0)
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();

		
		return $res;
	}	
	
	public function afterSaveDB()
	{
	
		global $primary_db,$sess;
		$res = array();
		$content = array();
		$obj = $this->m_data;
		if (!$obj) {
			$msg = "MENSAJE: No esta definido el contenido...";
			$res[] = $msg;
			return $res;
		}
		$cir_code = $obj->getField("cir_code")->getValue();
		// $cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		
		$html = "</td></tr><tr> <td></td> <td></td><td>";
		$html.= "<span style='font-size: 8pt ; font-family: Verdana,Arial,sans-serif'>";
		$html.= "<b>Monitoreo Nro: </b>".$obj->getField("mon_code")->getValue().".<br>";		
		$html.= "<b>Estado del Monitoreo: </b>".$obj->getField("mon_status")->getValue().".<br>";
		$html.= "<b>Cierre Forzado: </b>".$obj->getField("mon_forzado")->getValue().".<br>";
		$html.= "<b>Aprobó?: </b>".$obj->getField("mon_aprobo")->getValue().".<br>";
		$html.= "<b>Requiere Capacitacion?: </b>".$obj->getField("mon_perjuicio_cliente")->getValue().".<br>";			
		$html.= "<b>Puntaje: </b>".$obj->getField("mon_puntaje")->getValue().".<br>";
		$html.= "</span><td></tr><tr><td colspan=3>";
		$content['msgextra']= $html;
		
		return array($content, $res);
			
	}	
	
	
}


?>	
