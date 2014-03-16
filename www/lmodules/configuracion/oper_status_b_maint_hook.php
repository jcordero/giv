<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);


class coper_status_m_hooks extends cclass_maint_hooks
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
		if (!( isset($frm) && $frm->m_OP=="S" ))  return $res;		
		$OP = $frm->m_op_ant;	

		// Actualizo
		$use_code = intval($obj->getField("use_code")->getValue());
		$oper_grupo = $obj->getField("oper_grupo")->getValue();
		$oper_motivo_cierre = $obj->getField("oper_motivo_cierre")->getValue();
		if ($oper_motivo_cierre == '') 
		{
				$res[] = "MENSAJE: Debe ingresar un motivo de baja ";	
				return $res;
		}	
		$primary_db->beginTransaction();		
		$sql = "update oper_status set oper_motivo_cierre='".$oper_motivo_cierre."', oper_status='INACTIVO' where use_code=".$use_code;
		$primary_db->do_execute($sql, $err);		
		if (count($err) > 0) $res[]= "MENSAJE: Error al actualizar estado del operador";
		
		$sql = "update sec_users set use_login=concat(use_login,'.'), use_status='INACTIVO' where use_code=".$use_code;
		$primary_db->do_execute($sql, $err);		
		if (count($err) > 0) $res[]= "MENSAJE: Error al actualizar usuario del operador";	
		
		$sql = "update monitoreos set mon_forzado='SI', mon_motivo='Baja del Operador', mon_date= now(), ";
		$sql.= "mon_aprobo='NO',mon_puntaje=0,mon_perjuicio_cliente='NO',mon_status='CERRADO',mon_use_code=".$sess->user_id;
		$sql.= " where  use_code_operador=".$use_code."  and mon_status='PENDIENTE' ";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) $res[]= "MENSAJE: Error al actualizar el monitoreos pendientes";
			
		if (count($res) == 0)
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();			
		return $res;
	}	

	
}


?>	
