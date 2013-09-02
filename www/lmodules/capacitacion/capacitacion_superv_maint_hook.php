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

		$obj->getField("cap_visto_oper")->setValue("NO");
		$obj->getField("cap_status")->setValue("REALIZADO");
		
		return $res;
	}	
	
	
}


?>	
