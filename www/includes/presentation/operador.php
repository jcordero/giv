<?php 
include_once "presentation/select.php";

/** 	Tipo de dato: Codigo de usuario */
class CDH_OPERADOR  extends CDH_SELECT 
{
	function __construct($parent) 
	{
		parent::__construct($parent);
		$this->m_parent->m_search="fix";
		$this->m_fill_sql = "SELECT use_name,u.use_code FROM sec_users u join sec_usrgroup_users g on u.use_code = g.use_code where g.UGR_CODE = 'Operadores'";
		$this->m_helper_sql = "SELECT use_name FROM sec_users WHERE use_code='<val>' ";
	}

}

?>
