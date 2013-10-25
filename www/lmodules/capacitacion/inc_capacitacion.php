<?php
include_once "funciones/planillas.php";
function obtenerCallFile($call_date,$call_reference)
{
		global $primary_db;
		$call_path = "";
		$f = explode ('/',$call_date);
		$y = $f[2];
		$m = substr('0'.$f[1],-2);
		$d = substr('0'.$f[0],-2);
		
		// Buscar Log de Llamadas
		$path =$primary_db->QueryString("SELECT par_value FROM sec_parameters where par_code='path_calls_1' limit 1");
		$path.="/".$y.$m.$d."/";
		$callrecs = $path."Callrecs.log";
		if (!file_exists($callrecs)) {
		    // error_log(__FILE__." No se encontro el archivo: ".$callrecs);
			$path =$primary_db->QueryString("SELECT par_value FROM sec_parameters where par_code='path_calls_2' limit 1");
			$path.="/".$m."-".$y."/".$y.$m.$d."/";
			$callrecs = $path."Callrecs.log";			
			if (!file_exists($callrecs)) 
			{ 
			   
			   error_log(__FILE__." No se encontro el archivo: ".$callrecs);
			   return "";
			}
			
		}	
		// Buscar en el Log la Llamada
		$p = new planillas();
		if (!($planilla = $p->obtenerDatos($callrecs)))
		{
			 error_log(__FILE__." No se pudieron obtener los datos de la planilla $callrecs");
			return "";
		}
		if ($p->errmsj != "")
		{
			 error_log(__FILE__." Error en la Planilla $callrecs ".$p->errmsj);
			return "";
		}	
		$i = 0;
		$llamada = "";		 
		foreach ($planilla as $datos)
		{
			// if ($i<3)  error_log(__FILE__." Llamada $i ".print_r($datos,1));
			$i++;
			if ($datos[12]==$call_reference)
			{
				 $llamada = $datos[2];
				 break;
			}
		}
		if ($llamada != "") $call_path=$path.substr($llamada,9);
		return $call_path;
		
}	
?>