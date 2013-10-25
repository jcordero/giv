<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);


class ccapacitacion_hooks extends cclass_maint_hooks
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
		$cap_code = $obj->getField("cap_code")->getValue();
		$obj->getField("cap_visto_oper")->setValue("SI");
		$primary_db->beginTransaction();
		$sql = "update capacitacion set cap_visto_oper='SI' where cap_code = ".intval($cap_code);
		$out2 = $primary_db->do_execute($sql, $err2);
		if (count($err2) != 0)
			$res[] = "MENSAJE: Error al actualizar la capacitacion.";		
		if (count($res) == 0)
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();						
		return $res;
	}	
	
	
}


?>	
