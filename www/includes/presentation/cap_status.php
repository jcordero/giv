<?php 
include_once "presentation/selectarray.php";

class CDH_CAP_STATUS extends CDH_SELECTARRAY 
{
	function __construct($parent) 
	{
		parent::__construct($parent);
		$fld = $this->m_parent;
		$this->m_array = array(
		    "PENDIENTE"=>"PENDIENTE",
			"REALIZADO"=>"REALIZADO"		
			);
	}
		
}
?>