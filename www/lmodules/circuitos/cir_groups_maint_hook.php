<?php
include_once "funciones/validar.php";
class ccir_groups_hooks extends cclass_maint_hooks
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
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$oper_grupo = $obj->getField("oper_grupo")->getValue();
		$cirg_code =  $primary_db->QueryString("SELECT cirg_code FROM cir_groups where cir_code=".$cir_code." and oper_grupo='".$oper_grupo."' limit 1");
		if ($cirg_code != '')
		{
				$res[] = "MENSAJE: Ya existe un grupo para ese grupo de operadores en el circuito.";
				return $res;
		}
		return $res;
	}	
}


?>	
