<?php 
include_once "presentation/select.php";
class CDH_CIRCUITO_ACTIVO extends CDH_SELECT 
{
	function __construct($parent) 
	{

		parent::__construct($parent);
		$this->m_parent->m_search="fix";
		$this->m_helper_sql="SELECT cir_name FROM circuitos WHERE cir_code='<val>'";
		$this->m_fill_sql="SELECT  cir_name,cir_code FROM circuitos where cir_status='ACTIVO' order by cir_name";
	}
	

}

?>

