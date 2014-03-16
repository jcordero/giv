<?php 
include_once "presentation/select.php";

/** 	Tipo de dato: Codigo de usuario */
class CDH_ITEM  extends CDH_SELECT 
{
	function __construct($parent) 
	{

		parent::__construct($parent);
		$this->m_parent->m_search="fix";
		$this->m_helper_sql="SELECT if(it_critico='SI',concat('<font color=red>',it_name,'</font>'),it_name) as it_name FROM items WHERE it_code='<val>'";
		$this->m_fill_sql="SELECT  it_name,it_code FROM items order by it_name";
	}
	

}

?>