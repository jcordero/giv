<?php
set_time_limit(3600);

class cmonitoreos_superv_hooks extends cclass_maint_hooks
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

		$mon_code=$obj->getField("mon_code")->getValue();
		$cir_code = $obj->getField("cir_code")->getValue();
		// $cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		$mon_motivo=$obj->getField("mon_motivo")->getValue();
		
		$obj->getField("mon_status")->setValue("CERRADO");
		$obj->getField("mon_forzado")->setValue("SI");
		$obj->getField("mon_aprobo")->setValue("NO");
		$obj->getField("mon_puntaje")->setValue("0");	
		$obj->getField("mon_perjuicio_cliente")->setValue("NO");
		
		$sql = "update monitoreos set mon_forzado='SI', mon_motivo='".$mon_motivo."',";
		$sql.= "mon_aprobo='NO',mon_puntaje=0,mon_perjuicio_cliente='NO',mon_status='CERRADO',mon_use_code=".$sess->user_id;
		$sql.= " where mon_code=".$mon_code;
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) 
			$res[]= "MENSAJE: Error al actualizar el operador monitoreo";
			
		$sql3 = "update cir_oper set ";
		$sql3.= "cirg_cant_mon_mal=cirg_cant_mon_mal+1, ";
		$sql3.= "cirg_cant_mon_pendientes=cirg_cant_mon_pendientes-1, ";
		$sql3.= "cirg_cant_mon_cierre_forz=cirg_cant_mon_cierre_forz+1 ";
		$sql3.= " where cir_code=".intval($cir_code)." and use_code_operador=".intval($use_code_operador);
		$primary_db->do_execute($sql3, $err3);
		if (count($err3) > 0) 
			$res[]= "MENSAJE: Error al actualizar el operador ($use_code_operador).";
		

		
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
		
		$sql3 = "update cir_oper set cirg_puntaje_prom=ifnull(";
		$sql3.= "(select avg(mon_puntaje) from monitoreos m where m.cir_code = cir_oper.cir_code and m.use_code_operador=cir_oper.use_code_operador)";
		$sql3.= ",0) where cir_code=".intval($cir_code)." and use_code_operador=".intval($use_code_operador);		
		$primary_db->do_execute($sql3, $err3);
		if (count($err3) > 0) 
			$res[]= "MENSAJE: Error al actualizar el promedio del puntaje del operador ($use_code_operador).";
		else
		{
			$html = "</td></tr><tr> <td></td> <td></td><td>";
			$html.= "<span style='font-size: 8pt ; font-family: Verdana,Arial,sans-serif'>";
			$html.= "<b>Estado del Monitoreo: </b>".$obj->getField("mon_status")->getValue().".<br>";
			$html.= "<b>Cierre Forzado: </b>".$obj->getField("mon_forzado")->getValue().".<br>";
			$html.= "<b>Aprobó?: </b>".$obj->getField("mon_aprobo")->getValue().".<br>";
			$html.= "<b>Perjuicio al Vecino?: </b>".$obj->getField("mon_perjuicio_cliente")->getValue().".<br>";			
			$html.= "<b>Puntaje: </b>".$obj->getField("mon_puntaje")->getValue().".<br>";
			$html.= "</span><td></tr><tr><td colspan=3>";
			$content['msgextra']= $html;
		}
		return array($content, $res);
			
	}	
	
	
}


?>	
