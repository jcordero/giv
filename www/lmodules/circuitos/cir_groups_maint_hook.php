<?php
include_once "funciones/validar.php";
class ccircuitos_hooks extends cclass_maint_hooks
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
		$frm = $obj->m_parent;

		if (!( isset($frm) && ($frm->m_OP=="S" || $frm->m_OP=="M" || $frm->m_OP=="B" ||$frm->m_OP=="N"))) 
		                return $res;

		$cir_code = $obj->getField("cir_code")->getValue();
		$cir_status =  $primary_db->QueryString("SELECT cir_status FROM circuitos where cir_code='".$cir_code."' limit 1");
		if ($cir_status != 'PENDIENTE')
		{
				$res[] = "MENSAJE: Solo se pueden actualizar circuitos con estado PENDIENTE.";
				return $res;
		}
		return $res;
	}	
}


?>	
