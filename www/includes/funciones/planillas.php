<?php
if(!class_exists('planillas'))
{
	// Manejo de Planillas ---------------------------------
	define("PHPEXCEL_ROOT", "");
	include_once 'PHPExcel/Autoloader.php';
	include_once 'PHPExcel.php';
	include_once 'common/cfile.php';
	include_once "class_importar_excel.php";
	include_once "common/cclass_maint_hooks.php";
	include_once "common/ctimeline.php";

	class planillas
	{
		public $errmsj = "";
		public function obtenerDatos($nombreplanilla) {
			$planilla = array ();
			$this->errmsj = "";
			$extension = strtolower(substr($nombreplanilla, strrpos($nombreplanilla, ".") + 1));
			if (!is_file($nombreplanilla)) {
				$this->errmsj = "No se pudo cargar el archivo".$nombreplanilla;
				return $nombreplanilla;
			}
			if (($gestor = fopen($nombreplanilla, "r")) !== FALSE) {
					// Pruebo el separador ,
					$separator = ",";
					if (($datos = fgetcsv($gestor, 2048, $separator)) !== FALSE)
					{
						$pos = strpos($datos[0], ",");
							
						// Si obtubo un solo campo y tiene ; entonces el separador es ;
						if ( ($pos > 0) && (count($datos) <= 1) )
						{
							$separator = ",";
							fclose($gestor);
							$gestor = fopen($archivo, "r");
						}
						else
						$planilla[] = F($datos);
					}
					while (($datos = fgetcsv($gestor, 2048, $separator)) !== FALSE)
					$planilla[] = F($datos);

						
					fclose($gestor);
			}
					
			return $planilla;
		}

	}

	function contarCols($planilla)
	{
		$pla = array();
		foreach ($planilla as $datos)
		{
			$d = array();
			for ($i=0;$i<contar($datos);$i++)
			$d[] = $datos [$i];
			$pla[] = $d;
		}

		return $pla;

	}

	function contar($datos)
	{
		$cant = count($datos);
		$i = $cant-1;
		while ( ($i>0) && ($datos[$i]=='')   && ($datos[$i]!='0') ) $i--;
		$cant = $i+1;
		return $cant;
	}

	function F($datos)
	{
		$d = array();
		for ($i=0;$i<count($datos);$i++)
		$d[] = ltrim(rtrim(mb_convert_encoding($datos[$i],'UTF-8','UTF-8')));
		return $d;
	}
}
?>
