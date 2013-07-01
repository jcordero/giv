<?php

class citems_hooks extends cclass_maint_hooks
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

		if (!( isset($frm) && ($frm->m_OP=="S" || $frm->m_OP=="M" || $frm->m_OP=="N"))) 
		                return $res;
		$it_code = $obj->getField("it_code")->getValue();
		$it_order = $obj->getField("it_order")->getValue();
		$it_status = $obj->getField("it_status")->getValue();
		$it_importance = $obj->getField("it_importance")->getValue();
		if ($it_status == 'ACTIVO')
		{
			$sql = "select it_name from items where it_order = $it_order and it_status='ACTIVO' and it_code<>$it_code";
			$out = $primary_db->do_execute($sql, $err);
			if (count($err) != 0)
			{
				$res[] = "MENSAJE: Error al buscar un item con igual orden.";
				return $res;
			}		
			if ($row = $primary_db->_fetch_row($out))
			{
				$res[] = "MENSAJE: Ya existe un item ACTIVO con el mismo orden: (".$row["it_name"].")";
				return $res;
			}
		}
		return $res;
	}	
}


?>	
