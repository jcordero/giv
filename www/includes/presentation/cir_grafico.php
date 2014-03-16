<?php 
ini_set("display_errors","off");
include_once "common/cdatatypes.php";
include_once "funciones/grafico_circuito.php";
class CDH_CIR_GRAFICO extends CDataHandler {

	function __construct($parent) 
	{
		parent::__construct($parent);	
	
		$fld = $this->m_parent;
	}
	function graficar($cir_code)
	{
			global $sess,$primary_db;
	
			$g = new grafico_circuito();
			$html = $g->graficar ($cir_code);
			return json_encode((object) array("html"=>$html));;
	}


	
}

?>
