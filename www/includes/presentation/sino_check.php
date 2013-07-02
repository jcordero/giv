<?php 
include_once "presentation/checkbox.php";

class CDH_SINO_CHECK extends CDH_CHECKBOX
{
	function __construct($parent) 
	{
		parent::__construct($parent);
		$fld = $this->m_parent;
		$this->m_array = array(
			"SI"=>"SI",
			"NO"=>"NO");
	}
		
}
?>