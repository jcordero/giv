<?php
include_once "funciones/validar.php";
class ccir_groups_n_hooks extends cclass_maint_hooks
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
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$oper_grupo = $obj->getField("oper_grupo")->getValue();
		$cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor_ant =  $primary_db->QueryString("SELECT use_code_supervisor FROM cir_groups where cir_code=".$cir_code." and cirg_code=".$cirg_code." and oper_grupo='".$oper_grupo."' limit 1");
		if ($use_code_supervisor_ant == '')
		{
					$res[] = "MENSAJE: Supervisor anterior no encontrado.";
					return $res;
		}
		// Actualizar monitoreos y capacitaciones
		if ($use_code_supervisor_ant != $use_code_supervisor)
		{
				$sql = "update monitoreos set use_code_supervisor = $use_code_supervisor where ";
				$sql.= " use_code_operador in (select use_code from oper_status where oper_grupo='$oper_grupo') and cir_code=$cir_code and mon_status='PENDIENTE' ";
						
				$primary_db->do_execute($sql, $err);
				if (count($err) > 0) 
						$res[] = "MENSAJE: Error al actualizar los capacitaciones pendientes.";			
				else
				{
					$sql = "update capacitacion set use_code_supervisor = $use_code_supervisor where ";
					$sql.= " use_code_operador in (select use_code from oper_status where oper_grupo='$oper_grupo')  and cir_code=$cir_code and cap_status='PENDIENTE' ";
					$primary_db->do_execute($sql, $err2);
					if (count($err2) > 0) 
							$res[] = "MENSAJE: Error al actualizar los capacitaciones pendientes.";		
				}		
		}

		return $res;
	}	
}


?>	
