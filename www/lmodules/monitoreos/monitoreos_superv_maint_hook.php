<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "inc_circuitos.php";
include_once "common/cfile.php";

class cmonitoreos_superv_hooks extends cclass_maint_hooks
{	
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
		// Controlar si el circuito esta OK
		$cir_code = $obj->getField("cir_code")->getValue();
		$cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		$mon_call_reference = $obj->getField("mon_call_reference")->getValue();
		$mon_call_path =$primary_db->QueryString("SELECT par_value FROM sec_parameters where par_code='path_calls' limit 1")."/".date("Y").date("m")."/".$mon_call_reference;
		if (!file_exists($nombre_fichero)) {
			$res[] = "MENSAJE: No se encuentra el archivo de audio $mon_call_path";	
			return $res;
		}
		
		$cir_code1 =  $primary_db->QueryString("SELECT cir_code FROM circuitos where cir_date_ini <=date(now()) and cir_date_fin >=date(now()) and cir_status='ACTIVO' and cir_code='".$cir_code."' limit 1");
		if ($cir_code1 != $cir_code) {
			$res[] = "MENSAJE: El circuito $cir_code no corresponde a la fecha actual o no se encuentra ACTIVO. Inicie un nuevo circuito";			
			return $res;
		}	
		$cir_importance_min = $primary_db->QueryString("SELECT cir_importance_min FROM circuitos where cir_code='".$cir_code."' limit 1");
		$min_puntaje=$primary_db->QueryString("select par_value from sec_parameters where par_code = 'min_puntaje'");
		$mon_no_aprobo=$primary_db->QueryString("select par_value from sec_parameters where par_code = 'mon_no_aprobo'");
		$cap_perjuicio=$primary_db->QueryString("select par_value from sec_parameters where par_code = 'cap_perjuicio'");
		$mon_puntaje=0;
		$mon_perjuicio_cliente='NO';
		
		$i=0;	
		$it_critico = 0;
	    foreach($obj->m_childs['mon_items'] as $it)
	    {
		    $it_aprobo = $it->getField("it_aprobo")->getValue();
			$it_perjuicio_cliente = $it->getField("it_perjuicio_cliente")->getValue();
			$it_importance = intval($it->getField("it_importance")->getValue());
			// 
			if ( ($it->getField("it_critico")->getValue()=='SI') && $it_aprobo =='NO')	$it_critico++;			

			if ( ($it_perjuicio_cliente != 'SI') && ($it_perjuicio_cliente != 'NO'))
			{   $it_perjuicio_cliente = 'NO'; 
			    $it->getField("it_perjuicio_cliente")->setalue('NO');
			}
			if ( ($it_aprobo != 'SI') && ($it_aprobo != 'NO'))
			{   $it_aprobo = 'SI';
			    $it->getField("it_aprobo")->setValue('SI');
			}

			if ( $it_perjuicio_cliente == 'SI')
			    $mon_perjuicio_cliente='SI';
			if ($it_aprobo=='SI')
			{
			   $mon_puntaje=$mon_puntaje+$it_importance;
			   $it->getField("it_puntaje")->setValue($it_importance);
			}
			else
			   $it->getField("it_puntaje")->setValue(0);
		}
		$obj->getField("mon_status")->setValue("REALIZADO");
		$obj->getField("mon_puntaje")->setValue($mon_puntaje);
		$obj->getField("mon_perjuicio_cliente")->setValue($mon_perjuicio_cliente);
		$add_cap = 0;
        $add_mon = 0;
		$ok=0;
		
		if (($mon_perjuicio_cliente=='SI') && ($cap_perjuicio > 0)){
		
		     $obj->getField("mon_add_cap")->setValue("SI");
             for ($i=0;$i<$cap_perjuicio;$i++)
			{
 			 $error = insertar_capacitacion($cir_code,$cirg_code,$mon_code,$use_code_supervisor,$use_code_operador,$mon_call_reference); 	
			 if ($error != "") 
			   $res[] = "MENSAJE: Error al insertar Capacitacion";	
			 else  
				$add_cap++;
			}
		}	 
        else
		     $obj->getField("mon_add_cap")->setValue("NO");

		if ( ($mon_puntaje < $cir_importance_min) || ($mon_perjuicio_cliente=='SI') || ($it_critico > 0))
		{
		  $obj->getField("mon_aprobo")->setValue("NO");
		  $obj->getField("mon_add_mon")->setValue("SI");
		  if ($mon_no_aprobo > 0) 
		  {
		     $add_mon = $mon_no_aprobo;
		     
            for ($i=0;$i<$mon_no_aprobo;$i++)
			{
 			  $error = insertar_monitoreo($cir_code,$use_code_supervisor,$use_code_operador); 	
			  if ($error != "") $res[] = "MENSAJE: Error al insertar nuevo monitoreo";
			}
          }
		}
		else
		{
		  $ok=1;
		  $obj->getField("mon_add_mon")->setValue("NO");
		  $obj->getField("mon_aprobo")->setValue("SI");
		}

		
		$sql3 = "update cir_groups_oper set ";
//					$sql3.= "cirg_cierre_forzado='NO',";
//					$sql3.= "cirg_cierre_motivo='',";     
					if ($ok==1)
					   $sql3.= "cirg_cant_mon_ok=cirg_cant_mon_ok+1, ";
					else   
						$sql3.= "cirg_cant_mon_mal=cirg_cant_mon_mal+1, ";
					if ($add_cap>0)
					   $sql3.= "cirg_cant_cap_pendientes=cirg_cant_cap_pendientes+".intval($add_cap).", ";
					if ($add_mon>0)
						$sql3.= "cirg_cant_mon_pendientes=cirg_cant_mon_pendientes+".intval($add_mon).", ";
						
					$sql3.= "cirg_cant_mon_realizados=cirg_cant_mon_realizados+1 ";
					$sql3.= " where cirg_code=".intval($cirg_code)." and use_code_operador=".intval($use_code_operador);
					$primary_db->do_execute($sql3, $err3);
					if (count($err3) > 0) 
						$res[]= "MENSAJE: Error al actualizar el operador del grupo ($use_code_operador).";
							
		$error =  $this->saveDoc($mon_call_reference,$mon_call_reference,$mon_call_path,"") ;
		
		return $res;
	}	
	
	function saveDoc($name,$doc_code,$path_file,$nota) 
	{
		 global $primary_db,$sess;
		$obj = $this->m_data;
		//Datos del archivo original
		$arch = new _CFile();			
		$new_name = md5($name.time()).".mp3";
		$final_path = $arch->get_path($new_name);
		$archivo =  $final_path.$new_name;
		if (!copy ($path_file , $archivo ))
		    return "MENSAJE: No se pudo copiar $path_file a $archivo ";

		$arch->m_size = filesize($archivo);

		$obj->getField("doc_storage")->setValue($new_name);
		
		$sql = "INSERT INTO doc_documents(doc_code,doc_name,doc_tstamp,doc_mime,doc_size,";
		$sql.= "acl_code, use_code, doc_storage, doc_extension, doc_version, doc_note)";
		$sql.= " VALUES('".$doc_code."','".$name."',now() ,'mp3',";
		$sql.= intval(filesize($archivo)).",0,".$sess->user_id.",'".$new_name."','.mp3','1','".$nota."')";
		$rs = $primary_db->do_execute($sql,$res);
		if (count($res) > 0) return "MENSAJE: ERROR al guardar el archivo";
		return "";
   }	
	
}


?>	
