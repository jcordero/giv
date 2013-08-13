<?php
if(!class_exists('validar'))
{
	class validar
	{
	    public $error = "";
		public function valCuit($cuit1) {
			$suma = 0;
			$valor1= 0;
			$valor2= 0;

			$cuit = str_replace("-","",$cuit1);
			$longitud = strlen($cuit);
			$patron = "5432765432";
			if (!is_numeric($cuit)) return false;
			if ($longitud != 11) return false;

			$final = $cuit[10];
			$c = $cuit[0].$cuit[1];
			if ( ($c!="20") && ($c!="23") && ($c!="24") && ($c!="27") && ($c!="30") && ($c!="33") && ($c!="34")) 
			{
				return false;
			}
			for ($i=0;$i<=9;$i++)
			{
				$suma = $suma +  intval(substr($patron,$i,1)) * intval(substr($cuit,$i,1));
			}

			$valor1 = $suma % 11;
			$valor2 = 11 - $valor1;
			if ($valor2 == 11)
			{
				$valor2 = 0;
			}
			elseif ($valor2 == 10)
			{
				$valor2 = 9;
			}
			if (intval($valor2)== intval($final))
			return true;
			else
			return false;
		}

		public function valFecha($fecha)
		{
			$a = explode("/", $fecha);
			if (count($a) != 3 ) return false;
			if ( (checkdate($a[1],$a[0],$a[2])) && ($a[2] > 1900) && ($a[2] < 3000))
			return true;
			else
			return false;
		}
		public function fmtFechaVal($fecha)
		{
			if (!$this->valFecha($fecha)) return "";
			$a = explode("/", $fecha);
			$f = $a[2].'-'.$a[1].'-'.$a[0];
			return $f;
		}

		function compararFechas($primera, $segunda)
		{
			$this->error="";
			$valoresPrimera = explode ("/", $primera);
			$valoresSegunda = explode ("/", $segunda);
		
			$diaPrimera    = $valoresPrimera[0];
			$mesPrimera  = $valoresPrimera[1];
			$anyoPrimera   = $valoresPrimera[2];
		
			$diaSegunda   = $valoresSegunda[0];
			$mesSegunda = $valoresSegunda[1];
			$anyoSegunda  = $valoresSegunda[2];
		
			$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);
			$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);
		
			if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
				$this->error="La fecha ".$primera." no es v&aacute;lida";
				return 0;
			}elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
				$this->error="La fecha ".$segunda." no es v&aacute;lida";
				return 0;
			}else{
				return  $diasPrimeraJuliano - $diasSegundaJuliano;
			}
		
		}
		
		
		public function diffFecha($fec1,$fec2)
		{
			$f1 = $this->fmtFechaVal($fec1);
			$f2 = $this->fmtFechaVal($fec2);
			$datetime1 = new DateTime($f1);
			$datetime2 = new DateTime($f2);
			$intervalo = $datetime1->diff($datetime2);
			$dias = $intervalo->format('%a');
			if( $dias == 6015 ) {
				$y1 = $datetime1->format('Y');
				$y2 = $datetime2->format('Y');
				$z1 = $datetime1->format('z');
				$z2 = $datetime2->format('z');
				$dias = intval($y1 * 365.2425 + $z1) - intval($y2 * 365.2425 + $z2);
			}

			return $dias;
		}
		
		public function addDays($fec1,$dias)
		{
			$f1 = $this->fmtFechaVal($fec1);
			$datetime1 = new DateTime($f1);
			$i = 'P'.intval($dias).'D'; // P1D means a period of 1 day
			$datetime1->add(new DateInterval($i)); 
			$fec2 = $datetime1->format('d/m/Y');
			error_log("validar::addDays ($fec1,$dias) ".$i." ".$fec2);
			return $fec2;
		}		
		
		public function fmtFecha($fecha)
		{
			$datetime1 = new DateTime($fecha);
			$f = $datetime1->format('d/m/Y');
			error_log(" fmtFecha($fecha) => $f");
			return $f;
		}
		static function valCBU($cbu)
		{
			if ( strlen($cbu) <> 22 ) {
				return false;
			}else{
				$digitos_cbu = str_split($cbu);
				for ($i = 0; $i<=21; $i++){
					if ( !is_numeric($digitos_cbu[$i]) )
					return false;
				}
				if ($digitos_cbu[7] <> self::verificador($digitos_cbu, 0, 6)) {
					return false;
				}
				if ($digitos_cbu[21] <> self::verificador($digitos_cbu, 8, 20)) {
					return false;
				}
				return true;
			}
		}

		private function verificador($numero, $pos_inicial, $pos_final){
			$ponderador = array(3,1,7,9);
			$suma = 0;
			$j = 0;
			for ($i = $pos_final; $i >= $pos_inicial; $i--){
				$suma = $suma + ($numero[$i] * $ponderador[$j % 4]);
				$j++;
			}
			$digito = (10 - $suma % 10) % 10;
			return $digito;
		}
		public  function valProvincia($provincia) {
			$pr = array(
					"1"=>"Buenos Aires",
					"2"=>"Catamarca",
					"3"=>"Chaco",
					"4"=>"Chubut",
					"5"=>"Cordoba",
					"6"=>"Corrientes",
					"7"=>"Entre Rios",
					"8"=>"Formosa",
					"9"=>"Jujuy",
					"10"=>"La Pampa",
					"11"=>"La Rioja",
					"12"=>"Mendoza",
					"13"=>"Misiones",
					"14"=>"Neuquen",
					"15"=>"Rio Negro",
					"16"=>"Salta",
					"17"=>"San Juan",
					"18"=>"San Luis",
					"19"=>"Santa Cruz",
					"20"=>"Santa Fe",
					"21"=>"Santiago del Estero",
					"22"=>"Tierra del Fuego",
					"23"=>"Tucuman",
					"24"=>"Capital Federal");
			if( in_array( ucwords(strtolower($provincia)) ,$pr) )
			return true;
			else
			false;
		}

		public function valEmail($email){
 		    $fmt = "^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$";
			if (!preg_match('/'.$fmt.'/',$email)) return false;
			else
			return 	true;
		}

		public static function valCaracteresValidos ($dato){
			$exprecion = "#^[a-zA-ZZÑñáéíóúÁÉÍÓÚ*-.0-9[:space:]%@$/]*$#";
			//$replace = explode(",","Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,Ã�,Ã‰,Ã�,Ã“,Ãš,Ã‘,ÃƒÂ¡,ÃƒÂ©,ÃƒÂ­,ÃƒÂ³,ÃƒÂº,ÃƒÂ±,ÃƒÃƒÂ¡,ÃƒÃƒÂ©,ÃƒÃƒÂ­,ÃƒÃƒÂ³,ÃƒÃƒÂº,ÃƒÃƒÂ±");
			//	$search = explode(",","Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,Ã�,Ã‰,Ã�,Ã“,Ãš,Ã‘,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,Ã�,Ã‰,Ã�,Ã“,Ãš,Ã‘");
			//	$exprecion= str_replace($search, $replace, $exprecion);
			//if (!ereg("^[a-zA-ZÃ‘Ã±Ã¡Ã©Ã­Ã³ÃºÃ�Ã‰Ã�Ã“Ãš*-.0-9[:space:]@$/]*$" , $dato)) return false;
			// if (!ereg($exprecion , $dato)) return false;
			if (!preg_match($exprecion,$dato)) return false;
			else
				return true;
		}
		static function codigoAProvincia($cod_provincia) {
			$pr = array(
					"1"=>"Buenos Aires",
					"2"=>"Catamarca",
					"3"=>"Chaco",
					"4"=>"Chubut",
					"5"=>"Cordoba",
					"6"=>"Corrientes",
					"7"=>"Entre Rios",
					"8"=>"Formosa",
					"9"=>"Jujuy",
					"10"=>"La Pampa",
					"11"=>"La Rioja",
					"12"=>"Mendoza",
					"13"=>"Misiones",
					"14"=>"Neuquen",
					"15"=>"Rio Negro",
					"16"=>"Salta",
					"17"=>"San Juan",
					"18"=>"San Luis",
					"19"=>"Santa Cruz",
					"20"=>"Santa Fe",
					"21"=>"Santiago del Estero",
					"22"=>"Tierra del Fuego",
					"23"=>"Tucuman",
					"24"=>"Capital Federal");
			if( isset($pr[$cod_provincia]) )
			return $pr[$cod_provincia];
			else
			return "Cod.Provincia inválido";
		}

		public function fmtCuit ($cuit)
		{
			if ($cuit=='') return $cuit;
			$cuit = str_replace('-','',$cuit);
			$c3 = substr($cuit, -1);
			$c1 = substr($cuit, 0,2);
			$c2 = substr($cuit,  2, -1);
			$cuit1 = $c1."-".$c2."-".$c3;
			return $cuit1;
		}

    public function prox_dia_habil($fecha,$dias=0){
    	   	global $primary_db;
			$fechafmt = $this->fmtFechaVal($fecha);
        	$dia_habil = "";
			$i=0;
			// error_log("fecha $fecha fechafmt $fechafmt dias $dias");
			// bucle hasta encontrar el dia habil
			while($dia_habil == ""){
				// aumenta/disminuye un dia
				if ($dias==0)
				{
			  		$fecha_d = $fechafmt;
				}
				else
				{
			  		$fecha_d = $primary_db->QueryString("select ADDDATE('".$fechafmt."',".$dias.");");
				}
				// error_log(__FILE__."fecha_d  $fecha_d  ");
				$sql = "SELECT  DATE_FORMAT(STR_TO_DATE('$fecha_d','%Y-%m-%d'),'%d/%m/%Y') as fecha_h ,DATE_FORMAT(STR_TO_DATE('$fecha_d','%Y-%m-%d'), '%w') as diaw;"; 
				$re = $primary_db->do_execute($sql);
				if( $row = $primary_db->_fetch_row($re) )
				{
					$diaw = $row["diaw"]; 
					$fecha_h = $row["fecha_h"]; 
					// error_log(__FILE__."prox_dia_habil diaw $diaw fecha_h $fecha_h ");
					// ES SABADO O DOMINGO ??
					if (($diaw != "0") && ($diaw != "6")) 
					{
				    	// error_log("NO ES SABADO O DOMINGO");
				   		$par_fer_code = $primary_db->QueryString("select par_fer_code from par_feriados where par_fer_tstamp = STR_TO_DATE('".$fecha_h."','%d/%m/%Y')");
						// No es feriado !!!!
						// error_log("FERIADO ??".$par_fer_code);
						if (intval($par_fer_code) == 0)
						{
						    $dia_habil = $fecha_h;
						}
						else
						{
						   $dias++;
						}
					}
					else
					{
						   $dias++;
					}
				}
				else
				{
				   error_log(__FILE__." prox_dia_habil - Error en consulta sql ");
				}
				$i++;
				if ($i>30) { error_log(__FILE__."Error en funcion prox_dia_habil $dia_habil "); break;};
			}
			return $dia_habil;
		}
	
		public function valTexto($texto)
		{	
					
				//	if( preg_match('/[^a-z\s-ñÑ]/i', $texto))
					
			if( ! self::valCaracteresValidos($texto) )
			{
						return false;
			}
		
					$primerletra = $texto[0];
					$repetidas = 1;
					for ($i=1; $i < strlen($texto); $i++)
					{
						if($texto[$i] == $primerletra)
						{
							$repetidas++;
						}
					}

					if($repetidas == strlen($texto))
					{
						return false;
					}

					return true;
		}

     }
}
?>