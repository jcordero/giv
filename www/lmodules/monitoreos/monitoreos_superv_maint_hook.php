<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "inc_circuitos.php";
include_once "common/cfile.php";
include_once "funciones/planillas.php";
class cmonitoreos_superv_hooks extends cclass_maint_hooks
{	
	public $doc_storage;
	public $llamada = "";
	public $tel_origen = "";
	public $operador = "";	
	public function canSaveDB()
	{
		return false;
	}	
	public function afterLoadDB()
	{
		global $primary_db, $sess;
		$res = array();
		$obj = $this->m_data;
		$this->m_resultado = array();
		$this->cantidad = 0;
		if(!$obj) {
			$msg= "MENSAJE: No esta definido el contenido...";
			$res[]= $msg;
			return $res;
		}
		/* Comenzar Transaccion para actualizar TODAS las RUTAS !!!!
		$primary_db->beginTransaction();		
		$sql.= "select DATE_FORMAT(mon_call_date,'%d/%m/%Y') as mon_call_date,mon_call_reference,mon_code from monitoreos where mon_status= 'REALIZADO' limit 1,10";
		$r = array();
		$re = $primary_db->do_execute($sql);
		while( $row = $primary_db->_fetch_row($re) )
		{
			$mon_call_date = $row["mon_call_date"];
			$mon_call_reference = $row["mon_call_reference"];
			$mon_code = $row["mon_code"];			
			$doc_storage = $this->obtenerCallFile($mon_call_date,$mon_call_reference);
			$sql1 = "UPDATE monitoreos SET doc_storage='".$doc_storage."' where mon_code=".$mon_code;
			$primary_db->do_execute($sql1, $err1);
			if (count($err1) > 0) 
						$res[]= "MENSAJE: Error al actualizar el monitoreo.";				
		}
		if (count($res) == 0)
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();
		*/
		return $res;		
	}		
	
	public function beforeSaveDB()
	{
		global $primary_db,$sess;
		$content = array();
		$res = array();
		$obj = $this->m_data;
        if (!$obj) {
            $msg = "MENSAJE: No esta definido el contenido...";
            $res[] = $msg;
            return $res;
        }
		// Obtener Datos de Pantalla
		$mon_code = $obj->getField("mon_code")->getValue();
		$cir_code = $obj->getField("cir_code")->getValue();
		// $cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		$mon_date_aprox = $obj->getField("mon_date_aprox")->getValue();
		$cir_semana = $obj->getField("cir_semana")->getValue();
		$mon_note = $obj->getField("mon_note")->getValue();
		$mon_status=$obj->getField("mon_status")->getValue();
		$add_cap_ant = $obj->getField("mon_add_cap")->getValue();
		$add_mon_ant = $obj->getField("mon_add_mon")->getValue();		

		/* Controlar si el circuito esta OK sacar !!! se monitorean todos
		$cir_code1 =  $primary_db->QueryString("SELECT cir_code FROM circuitos where cir_date_ini <=date(now()) and cir_date_fin >=date(now()) and cir_status='ACTIVO' and cir_code='".$cir_code."' limit 1");
		if ($cir_code1 != $cir_code) {
			$res[] = "MENSAJE: El circuito $cir_code no corresponde a la fecha actual o no se encuentra ACTIVO. Inicie un nuevo circuito";			
			return $res;
		}
*/		
		// Tomar datos de la llamada
		$mon_call_date = $obj->getField("mon_call_date")->getValue();
		$mon_call_reference = $obj->getField("mon_call_reference")->getValue();
		
		// Obtener archivo de la llamada
		$mon_call_path = $this->obtenerCallFile($mon_call_date,$mon_call_reference);
		
		// Ver si el archivo existe
		$path_validar =$primary_db->QueryString("SELECT par_value FROM sec_parameters where par_code='path_validar' limit 1");
		// error_log("mon_call_path   $mon_call_path");
		if (($mon_call_path=="") || (!file_exists($mon_call_path))) {
			  if(strtoupper($path_validar) == strtoupper("SI") ) {	
				$res[] = "MENSAJE: No se encuentra el archivo de audio $mon_call_path";	
				return $res;
			  }	
		}
		// Comenzar Transaccion
		$primary_db->beginTransaction();		
		
		// Resguardar la llamada en documents
		$doc_code = "mon_code:".$mon_code;
		$this->doc_storage = $mon_call_path;
		$obj->getField("doc_storage")->setValue($this->doc_storage);
		

		$cir_importance_min = $primary_db->QueryString("SELECT cir_importance_min FROM circuitos where cir_code='".$cir_code."' limit 1");
		$min_puntaje=$primary_db->QueryString("select par_value from sec_parameters where par_code = 'min_puntaje'");
		$mon_no_aprobo=$primary_db->QueryString("select par_value from sec_parameters where par_code = 'mon_no_aprobo'");
		$cap_perjuicio=$primary_db->QueryString("select par_value from sec_parameters where par_code = 'cap_perjuicio'");

		$mon_puntaje=0;
		$mon_perjuicio_cliente='NO';
		
		$i=0;	
		$it_critico = 0;
		$it_no_critico = 0;
	    foreach($obj->m_childs['mon_items'] as $it)
	    {
		    $it_code = $it->getField("it_code")->getValue();
		    $it_note = $it->getField("it_note")->getValue();
		    $it_aprobo = $it->getField("it_aprobo")->getValue();
			if ($it_aprobo=='on') $it_aprobo = 'SI';
			if ($it_aprobo=='') $it_aprobo = 'NO';
			
			$it_perjuicio_cliente = $it->getField("it_perjuicio_cliente")->getValue();
			if ($it_perjuicio_cliente=='on') $it_perjuicio_cliente = 'SI';
			if ($it_perjuicio_cliente=='') $it_perjuicio_cliente = 'NO';
			
			$it_importance = intval($it->getField("it_importance")->getValue());
			// 
			$ic = $it->getField("it_critico")->getValue();
			error_log ("it_code $it_code, it_aprobo $it_aprobo it_perjuicio_cliente $it_perjuicio_cliente it_critico $ic  ");
			if ( $it_aprobo =='NO')
			{
			   error_log ( "$it_aprobo =='NO'");
			   error_log ( $it->getField("it_critico")->getValue() );
			   if ($it->getField("it_critico")->getValue()=='SI') {
			      $it_critico = $it_critico + 1 ;		
			   }
               $it_no_critico = $it_no_critico + 1 ;
			}   
			if ( ($it_perjuicio_cliente != 'SI') && ($it_perjuicio_cliente != 'NO'))
			{   $it_perjuicio_cliente = 'NO'; 
			    $it->getField("it_perjuicio_cliente")->setvalue('NO');
			}
			if ( ($it_aprobo != 'SI') && ($it_aprobo != 'NO'))
			{   $it_aprobo = 'SI';
			    $it->getField("it_aprobo")->setValue('SI');
			}

			if ( $it_perjuicio_cliente == 'SI')
			    $mon_perjuicio_cliente='SI';
			if ($it_aprobo!='SI') $it_importance = 0;
		    $mon_puntaje=$mon_puntaje+$it_importance;
			$it->getField("it_puntaje")->setValue($it_importance);
			   
			$sql2 = "UPDATE mon_items SET  it_puntaje=".$it_importance.", it_aprobo= '".$it_aprobo."', it_perjuicio_cliente= '".$it_perjuicio_cliente;
			$sql2.= "', it_note= '".$it_note."' WHERE mon_code=$mon_code AND it_code=".$it_code;
			$primary_db->do_execute($sql2, $err2);
			if (count($err2) > 0)  $res[]= "MENSAJE: Error al actualizar el monitoreo.";					 
		}
		$obj->getField("mon_status")->setValue("REALIZADO");
		$obj->getField("mon_puntaje")->setValue($mon_puntaje);
		$obj->getField("mon_perjuicio_cliente")->setValue($mon_perjuicio_cliente);

		// Ver si hay que agregar o eliminar capacitaciones 
		$mon_add_cap = 0;		
		$add_cap = 0;
		if (($mon_perjuicio_cliente=='SI') && ($cap_perjuicio > 0)) {	     
			 $mon_add_cap = $cap_perjuicio;
			 $add_cap = $cap_perjuicio - $add_cap_ant;
             for ($i=0;$i<$add_cap;$i++)
			{
 			 $error = insertar_capacitacion($cir_code,$mon_code,$use_code_supervisor,$use_code_operador,$mon_call_path); 	
			 if ($error != "") 
			   $res[] = "MENSAJE: Error al insertar Capacitacion";	
				
			}
		} else {
			 $mon_add_cap = 0;
			 $add_cap = 0 - $add_cap_ant;
		}
		if ($add_cap < 0) 
		{
		   $cant_borrar =  - $add_cap;
		   $borrados=0;
           for ($i=0;$i<$cant_borrar;$i++)
		   {		   
		     $error = del_capacitacion($cir_code,$mon_code,$use_code_operador,1);
		     if ($error != "") 
			   error_log( __FILE__." Error al eliminar Capacitaciones Agregadas, ".$error);
			 else  
			   $borrados++;

		   }
			if ($borrados != $cant_borrar)
			 {
			   error_log( __FILE__." No se eliminaron todas las capacitaciones agregadas");
			   $mon_add_cap = $mon_add_cap + ($cant_borrar - $borrados);
			 }			
		}
		// Analizar Monitoreos a agregar o eliminar 
		$mon_add_mon = 0;
        $add_mon = 0;	
		error_log ( "$mon_puntaje < $cir_importance_min) || ($mon_perjuicio_cliente=='SI') || ($it_no_critico > 1) || ($it_critico > 0) ");
		if ( ($mon_puntaje < $cir_importance_min) || ($mon_perjuicio_cliente=='SI') || ($it_no_critico > 1) || ($it_critico > 0))
		{
		  $obj->getField("mon_aprobo")->setValue("NO");
		  $mon_add_mon = $mon_no_aprobo;
		  $add_mon = $mon_no_aprobo - $add_mon_ant;
		  if ($add_mon > 0) 
		  { 
				for ($i=0;$i<$add_mon;$i++)
				{
				  $error = insertar_monitoreo($cir_code,$use_code_supervisor,$use_code_operador,$mon_date_aprox,$cir_semana); 	
				  if ($error != "") $res[] = "MENSAJE: Error al insertar nuevo monitoreo";
				}
          }
		}
		else
		{
		  $obj->getField("mon_aprobo")->setValue("SI");
		  $mon_add_mon = 0;
		  $add_mon = 0 - $add_mon_ant;		  
		}
		
		if ($add_mon < 0) 
		{
		   $cant_borrar =  - $add_mon;
		   $borrados = 0;
           for ($i=0;$i<$cant_borrar;$i++)
		   {		   
			   $error = del_monitoreo($cir_code,$mon_date_aprox, $use_code_operador, 1);
			   if ($error != "") 
				   error_log( __FILE__." Error al eliminar Monitoreos. ".$error);
			   else   
				   $borrados++;

		   }
			if ($borrados != $cant_borrar)
			 {
			   error_log( __FILE__." No se eliminaron todos los monitoreos agregados");
			   $mon_add_mon = $mon_add_mon + ($cant_borrar - $borrados);
			 }					   
		}
		$obj->getField("mon_add_cap")->setValue($mon_add_cap);
		$obj->getField("mon_add_mon")->setValue($mon_add_mon);		
		if (count($res)==0)
		{
			// Actualizar circuito
			$sql1 = "UPDATE monitoreos SET use_code_supervisor=".$use_code_supervisor.", mon_date= now(), ";
			$sql1.= "mon_status= 'REALIZADO', mon_forzado= '', mon_motivo= '', mon_note= '$mon_note', ";
			$sql1.= "cli_call_code= '".$obj->getField("cli_call_code")->getValue()."', ";
			$sql1.= "mon_call_date= STR_TO_DATE('".$mon_call_date."','%d/%m/%Y %k:%i:%s'), mon_call_reference= '".$mon_call_reference."',";
			$sql1.= "doc_storage= '".$this->doc_storage."', mon_puntaje= $mon_puntaje ,";
			$sql1.= "mon_aprobo= '".$obj->getField("mon_aprobo")->getValue()."', mon_perjuicio_cliente= '".$mon_perjuicio_cliente."',"; 
			$sql1.= "mon_add_mon=".$mon_add_mon.", mon_add_cap=".$mon_add_cap.", mon_use_code= ".$sess->user_id.", ";
			$sql1.= "mon_call_llamada='".$this->llamada."',";
			$sql1.= "mon_call_tel_origen='". $this->tel_origen."',";
			$sql1.= "mon_call_operador='".$this->operador."' ";	
			$sql1.= " WHERE mon_code=".$mon_code;
			$primary_db->do_execute($sql1, $err1);
			if (count($err1) > 0) 
						$res[]= "MENSAJE: Error al actualizar el monitoreo.";			

							
		}
		if (count($res) == 0)
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();
		
		return $res;
	}	
	/*
	function saveDoc($name,$doc_code,$path_file,$nota) 
	{
		 global $primary_db,$sess;
		$obj = $this->m_data;
		//Datos del archivo original
		$arch = new _CFile();			
		$name = md5($name.time());
		$vox = $name.".vox";
		$this->doc_storage = $name.".wav";
		
		$final_path = $arch->get_path($this->doc_storage);
		$archivo =  $final_path.$this->doc_storage;
		$vox =  $final_path.$vox;
		
		if (!copy ($path_file , $vox ))
		    return "MENSAJE: No se pudo copiar archivo VOX de $path_file a $vox ";
			
        $c = "sox -r 6k ".$vox." ".$archivo;
        exec($c, $output);
		if (!is_file($archivo))
			return "MENSAJE: No se pudo crear archivo wav de $vox $archivo ";
		if (!unlink ($vox))
			error_log ("No se pudo eliminar archivo ".$vox );
		$arch->m_size = filesize($archivo);		
		$sql = "INSERT INTO doc_documents(doc_code,doc_name,doc_tstamp,doc_mime,doc_size,";
		$sql.= "acl_code, use_code, doc_storage, doc_extension, doc_version, doc_note)";
		$sql.= " VALUES('".$doc_code."','".$name."',now() ,'audio/x-wav',";
		$sql.= intval(filesize($archivo)).",0,".$sess->user_id.",'".$this->doc_storage."','.wav','1','".$nota."')";
		$rs = $primary_db->do_execute($sql,$res);
		if (count($res) > 0) return "MENSAJE: ERROR al guardar el archivo";
		return "";
		
   }	
   */
   
   		
		
	function whereIs($file_name,$dir) {
	    // error_log("whereIs($file_name,$dir)");
		$path = "";
		if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while ((($file = readdir($dh)) !== false) && ($path=="")) {
					    // error_log($file);
					    if (($file != ".") && ($file != ".."))
						{
							$file1 = $dir."/".$file;
							if (is_dir($file1))
							{
							   //error_log ($file1." es dir");
							   $path = $this->whereIs($file_name,$file1);
							   //error_log("path->".$path);
							} else {
							   if ($file == $file_name)
							   {
								 // error_log ($file1." es el FILE !!!!!");
								  $path = $file1;
								}  
							}
						}
					}
					closedir($dh);
				}
		}			
		return $path; 
	}

 
	public function afterSaveDB()
	{
	
		global $primary_db,$sess;
		$res = array();
		$content = array();
		$obj = $this->m_data;
		if (!$obj) {
			$msg = "MENSAJE: No esta definido el contenido...";
			$res[] = $msg;
			return $res;
		}
		$cir_code = $obj->getField("cir_code")->getValue();
		// $cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		
		$html = "</td></tr><tr> <td></td> <td></td><td>";
		$html.= "<span style='font-size: 8pt ; font-family: Verdana,Arial,sans-serif'>";
		$html.= "<b>Monitoreo Nro: </b>".$obj->getField("mon_code")->getValue().".<br>";
		$html.= "<b>Estado del Monitoreo: </b>".$obj->getField("mon_status")->getValue().".<br>";
		$html.= "<b>Aprobó?: </b>".$obj->getField("mon_aprobo")->getValue().".<br>";
		$html.= "<b>Requiere Capacitacion?: </b>".$obj->getField("mon_perjuicio_cliente")->getValue().".<br>";			
		$html.= "<b>Puntaje: </b>".$obj->getField("mon_puntaje")->getValue().".<br>";
		$html.= "</span><td></tr><tr><td colspan=3>";
		$content['msgextra']= $html;
		
		return array($content, $res);

			
	}

	function obtenerCallFile($mon_call_date,$mon_call_reference)
	{
		global $primary_db;
		$mon_call_path = "";
		$f = explode ('/',$mon_call_date);
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
		$this->llamada = "";
  	    $this->tel_origen = "";
		$this->operador = "";				 
		foreach ($planilla as $datos)
		{
			// if ($i<3)  error_log(__FILE__." Llamada $i ".print_r($datos,1));
			$i++;
			if ($datos[12]==$mon_call_reference)
			{
				 $this->llamada = $datos[2];
				 $this->tel_origen = $datos[10];
				 $this->operador = $datos[14];		
				/*
				 error_log(__FILE__." Llamada encontrada ".print_r($datos,1));
				 error_log(__FILE__." Llamada  ".$this->llamada);
				 error_log(__FILE__." tel_origen ".$this->tel_origen);
				 error_log(__FILE__." oper ".$this->operador);			
				 */
				 break;
			}
		}
		if ($this->llamada != "") $mon_call_path=$path.substr($this->llamada,9);
		return $mon_call_path;
		
	}
	
}


?>	
