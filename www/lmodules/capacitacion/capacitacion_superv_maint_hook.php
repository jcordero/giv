<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);


class ccapacitacion_hooks extends cclass_maint_hooks
{	
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
		// Controlar si el circuito esta OK
		$cap_code = $obj->getField("mon_code")->getValue();
		$mon_code = $obj->getField("mon_code")->getValue();
		$cir_code = $obj->getField("cir_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		$cap_rol_play_aprobado	= $obj->getField("cap_rol_play_aprobado")->getValue();

		$obj->getField("cap_visto_oper")->setValue("NO");
		$obj->getField("cap_status")->setValue("REALIZADO");
		$sql3 = "update cir_oper set ";
		if ($cap_rol_play_aprobado=="SI")
		   $sql3.= "cirg_cant_cap_ok=cirg_cant_cap_ok+1, ";
		else   
		  $sql3.= "cirg_cant_cap_mal=cirg_cant_cap_mal+1, ";
		$sql3.= "cirg_cant_cap_pendientes=cirg_cant_cap_pendientes-1,";
		$sql3.= "cirg_cant_cap_realizados=cirg_cant_cap_realizados+1 ";
		$sql3.= " where use_code_operador=".intval($use_code_operador);
		$primary_db->do_execute($sql3, $err3);
		if (count($err3) > 0) 
			$res[]= "MENSAJE: Error al actualizar el operador del grupo ($use_code_operador).";
		
		return $res;
	}	
	
	
}


?>	
