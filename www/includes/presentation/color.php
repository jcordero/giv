 <?php 
include_once "presentation/selectarray.php";

/** 	Tipo de dato: Codigo de empresa cliente*/
class CDH_COLOR extends CDH_SELECTARRAY 
{
	function __construct($parent) 
	{
		parent::__construct($parent);
		$fld = $this->m_parent;
		$this->m_array = array(
			"AMARILLO"=>"AMARILLO",
			"BLANCO"=>"BLANCO",
			"CELESTE"=>"CELESTE",
			"VERDE"=>"VERDE"
		);
	}
		
}
?>