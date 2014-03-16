<?php 
/* Pantalla inicial para el operador de denu cgpc
 */
if(!class_exists('home_default'))
{
    include_once "common/cfield.php";
	include_once "funciones/grafico_circuito.php";
	class home_default
	{

		public function Render($context)
		{
			global $sess,$primary_db;
			$cir_code = intval($primary_db->QueryString("select cir_code from circuitos where cir_status='ACTIVO'"));	
			$g = new grafico_circuito();
			$content["home_default"] = $g->graficar ($cir_code);
			return array( $content, array() );
		}
	}
}

?>	
