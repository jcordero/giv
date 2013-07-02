<?php 
include_once "presentation/select.php";

/** 	Tipo de dato: Codigo de usuario */
class CDH_CRIT_STATUS  extends CDH_SELECT 
{
	function __construct($parent) 
	{

		parent::__construct($parent);
		$this->m_parent->m_search="fix";
		$this->m_helper_sql="SELECT crit_status_name FROM crit_status WHERE crit_status='<val>'";
		$this->m_fill_sql="SELECT  crit_status_name,crit_status FROM crit_status order by crit_status_name";
	}
	

}

?>

