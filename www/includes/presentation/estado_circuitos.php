<?php 
include_once "presentation/selectarray.php";

class CDH_ESTADO_CIRCUITOS extends CDH_SELECTARRAY 
{
	function __construct($parent) 
	{
		parent::__construct($parent);
		$fld = $this->m_parent;
		$this->m_array = array(
		    "PENDIENTE"=>"PENDIENTE",
			"ACTIVO"=>"ACTIVO",
			"CERRADO"=>"CERRADO",
			"ANULADO"=>"ANULADO"
			);
	}
		
}
?>