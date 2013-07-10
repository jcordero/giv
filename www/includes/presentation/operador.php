<?php 
include_once "presentation/select.php";

/** 	Tipo de dato: Codigo de usuario */
class CDH_OPERADOR  extends CDH_SELECT 
{
	function __construct($parent) 
	{
		parent::__construct($parent);
		global $sess, $primary_db;
		$fld = $this->m_parent;
		$this->m_parent->m_search="fix";
		$this->m_fill_sql = "SELECT use_name,u.use_code FROM sec_users u join sec_usrgroup_users g on u.use_code = g.use_code where g.UGR_CODE = 'Operadores'";
		$this->m_helper_sql = "SELECT use_name FROM sec_users WHERE use_code='<val>' ";
		// Si el usuarui actual es Operador, inicializo el combo de busqueda con el usuario actual
		if(isset($sess))
		{
		    $use_code = $sess->getUserId();
		    $use_code1 = $primary_db->QueryString("SELECT u.use_code FROM sec_users u join sec_usrgroup_users g on u.use_code = g.use_code where g.UGR_CODE = 'Operadores' and u.use_code='$use_code' limit 1");
			if ($use_code == $use_code1) $fld->m_InitialValue = $use_code;
		}	

	}

}

?>
