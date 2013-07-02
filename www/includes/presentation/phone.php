<?php 
include_once "common/cdatatypes.php";

class CDH_PHONE extends CDataHandler {
	function __construct($parent) {
		parent::__construct($parent);
		$fld = $this->m_parent;
		$fld->m_allow_blank=true;
		$fld->m_js_validate = "valPHONE";
		$fld->m_cols = 20;
	}
	
	function getJsIncludes()
	{	
		return '<script type="text/javascript" src="'.WEB_PATH.'/includes/presentation/phone.js"></script>';
	}
}
?>