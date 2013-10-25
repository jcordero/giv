<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "inc_capacitacion.php";

class ccapacitacion_hooks extends cclass_maint_hooks
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
		$cap_code = $primary_db->Sequence("capacitacion");
		$obj->getField("cap_code")->setValue($cap_code);
		// $obj->getField("mon_code")->setValue(0);
		$obj->getField("cap_visto_oper")->setValue("NO");
		$obj->getField("cap_status")->setValue("REALIZADO");

		
		// Obtener archivos de la llamada
		$path_validar =$primary_db->QueryString("SELECT par_value FROM sec_parameters where par_code='path_validar' limit 1");	
	    foreach($obj->m_childs['cap_calls'] as $aud)
	    {
			// Tomar datos de la llamada
			
			$cap_call = $primary_db->Sequence("cap_call");
			$cap_call_date = $aud->getField("cap_call_date")->getValue();
			$cap_call_reference = $aud->getField("cap_call_reference")->getValue();		
			$cap_call_aprobo= $aud->getField("cap_call_aprobo")->getValue();				
			// Obtener archivo de la llamada
			$doc_storage = obtenerCallFile($cap_call_date,$cap_call_reference);
			if (($doc_storage=="") || (!file_exists($doc_storage))) {
				  if(strtoupper($path_validar) == strtoupper("SI") ) {	
					$res[] = "MENSAJE: No se encuentra el archivo de audio $cap_call_reference";	
					return $res;
				  }	
			}
			$aud->getField("cap_code")->setValue($cap_code);	
			$aud->getField("cap_call")->setValue($cap_call);	
			$aud->getField("doc_storage")->setValue($doc_storage);			
		}		
		return $res;
	}	
	
	
}


?>	
