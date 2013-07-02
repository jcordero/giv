<?php
class ccircuitos_hooks extends cclass_maint_hooks
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

		if (!( isset($frm) && ($frm->m_OP=="S" || $frm->m_OP=="M" ))) 
		                return $res;

		$cir_code = $obj->getField("cir_code")->getValue();
		$cir_date_ini = $obj->getField("cir_date_ini")->getValue();
		$cir_date_fin = $obj->getField("cir_date_fin")->getValue();
		$cir_status = $obj->getField("cir_status")->getValue();
		$cir_importance_min = $obj->getField("cir_importance_min")->getValue();
		if  ( ($cir_status != 'PENDIENTE') && ($cir_status != 'ACTIVO'))
		{
				$res[] = "MENSAJE: Solo se pueden anular circuitos con estado PENDIENTE o ACTIVO.";
				return $res;
		}
		// -- "ANULA" ---------------------------------------------------
		$sql = "update circuitos set cir_status = 'ANULADO',cir_date_fin=now()  where cir_code = '".$cir_code."'";
		$primary_db->do_execute($sql,$err);
		if(count($err) != 0)
		{
				$res[] = "MENSAJE: El circuito no pudo actualizarse.";
		}			

		return $res;
	}	
}


?>	
