<?php
set_time_limit(3600);

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
		$obj->getField("mon_status")->setValue("CERRADO");
		$obj->getField("mon_forzado")->setValue("SI");
		$obj->getField("mon_aprobo")->setValue("NO");
		$obj->getField("mon_puntaje")->setValue("0");	
		$obj->getField("mon_perjuicio_cliente")->setValue("NO");
		
		$sql3 = "update cir_groups_oper set ";
		$sql3.= "cirg_cant_mon_mal=cirg_cant_mon_mal+1, ";
		$sql3.= "cirg_cant_mon_pendientes=cirg_cant_mon_pendientes-1, ";
		$sql3.= "cirg_cant_mon_cierre_forz=cirg_cant_mon_cierre_forz+1 ";
		$sql3.= " where cirg_code=".intval($cirg_code)." and use_code_operador=".intval($use_code_operador);
		$primary_db->do_execute($sql3, $err3);
		if (count($err3) > 0) 
			$res[]= "MENSAJE: Error al actualizar el operador ($use_code_operador).";
		
		return $res;
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
		$cirg_code = $obj->getField("cirg_code")->getValue();
		$use_code_supervisor = $obj->getField("use_code_supervisor")->getValue();
		$use_code_operador = $obj->getField("use_code_operador")->getValue();
		
		$sql3 = "update cir_groups_oper set cirg_puntaje_prom=ifnull(";
		$sql3.= "(select avg(mon_puntaje) from monitoreos m where m.cirg_code = cir_groups_oper.cirg_code and m.use_code_operador=cir_groups_oper.use_code_operador)";
		$sql3.= ",0) where cirg_code=".intval($cirg_code)." and use_code_operador=".intval($use_code_operador);		
		$primary_db->do_execute($sql3, $err3);
		if (count($err3) > 0) 
			$res[]= "MENSAJE: Error al actualizar el promedio del puntaje del operador ($use_code_operador).";
		else
		{
			$html = "</td></tr><tr> <td></td> <td></td><td>";
			$html.= "<span style='font-size: 8pt ; font-family: Verdana,Arial,sans-serif'>";
			$html.= "<b>Estado del Monitoreo: </b>".$obj->getField("mon_status")->getValue().".<br>";
			$html.= "<b>Cierre Forzado: </b>".$obj->getField("mon_forzado")->getValue().".<br>";
			$html.= "<b>Aprobó?: </b>".$obj->getField("mon_aprobo")->getValue().".<br>";
			$html.= "<b>Perjuicio al Cliente?: </b>".$obj->getField("mon_perjuicio_cliente")->getValue().".<br>";			
			$html.= "<b>Puntaje: </b>".$obj->getField("mon_puntaje")->getValue().".<br>";
			$html.= "</span><td></tr><tr><td colspan=3>";
			$content['msgextra']= $html;
		}
		return array($content, $res);
			
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
