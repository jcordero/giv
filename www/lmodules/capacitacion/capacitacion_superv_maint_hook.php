<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "inc_capacitacion.php";
class ccapacitacion_hooks extends cclass_maint_hooks
{	
	public function canSaveDB()
	{
		return false;
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
		$cap_code = $obj->getField("cap_code")->getValue();
		$cap_origen = $obj->getField("cap_origen")->getValue();
		$cap_motivo = $obj->getField("cap_motivo")->getValue();
		$cap_habilidad = $obj->getField("cap_habilidad")->getValue();
		$cap_tipo_tramite = $obj->getField("cap_tipo_tramite")->getValue();
		$cap_observaciones = $obj->getField("cap_observaciones")->getValue();
		$cap_rol_play_aprobado = $obj->getField("cap_rol_play_aprobado")->getValue();		
		$cap_date = $obj->getField("cap_date")->getValue();	
		$primary_db->beginTransaction();
		$sql = "update capacitacion set cap_visto_oper='NO',cap_status='REALIZADO',cap_origen='$cap_origen', cap_motivo='$cap_motivo', cap_habilidad='$cap_habilidad',cap_use_code=".$sess->user_id;
		$sql.= ", cap_tipo_tramite='$cap_tipo_tramite', cap_observaciones='$cap_observaciones', cap_date=STR_TO_DATE('".$cap_date."','%d/%m/%Y'), cap_rol_play_aprobado='$cap_rol_play_aprobado' where cap_code = ".intval($cap_code);
		$out2 = $primary_db->do_execute($sql, $err2);
		if (count($err2) != 0)
			$res[] = "MENSAJE: Error al actualizar la capacitacion.";		
		else {
			// Obtener archivos de la llamada
			$path_validar =$primary_db->QueryString("SELECT par_value FROM sec_parameters where par_code='path_validar' limit 1");	
			foreach($obj->m_childs['cap_calls'] as $aud)
			{
				$cap_call = $aud->getField("cap_call")->getValue();
				error_log($aud->m_op );
				if (($aud->m_op == 'A')	|| ($aud->m_op == 'M') || ($aud->m_op == 'B') )
				{
					if (($aud->m_op == 'A')	|| ($aud->m_op == 'M')) {
						// Tomar datos de la llamada

						$cap_call_date = $aud->getField("cap_call_date")->getValue();
						$cap_call_reference = $aud->getField("cap_call_reference")->getValue();	
						$cap_call_aprobo= $aud->getField("cap_call_aprobo")->getValue();	
						$cap_note = $aud->getField("cap_note")->getValue();							
						// Obtener archivo de la llamada
						$doc_storage = obtenerCallFile($cap_call_date,$cap_call_reference);
						if (($doc_storage=="") || (!file_exists($doc_storage))) {
							  if(strtoupper($path_validar) == strtoupper("SI") ) {	
								$res[] = "MENSAJE: No se encuentra el archivo de audio $cap_call_reference";	
							  }	
						}
					}	
					if ($aud->m_op == 'A')	
					{
						$cap_call = $primary_db->Sequence("cap_call");

						$sql = "INSERT INTO cap_calls(cap_code,cap_call, cap_call_date, cap_call_reference, doc_storage, cap_call_aprobo, cap_note) ";
						$sql.= "VALUES (".$cap_code.", ".$cap_call.",STR_TO_DATE('".$cap_call_date."','%d/%m/%Y'), '".$cap_call_reference."', '".$doc_storage."', '".$cap_call_aprobo."','".$cap_note."')";
					}
					elseif ($aud->m_op == 'M')
						$sql = "UPDATE cap_calls SET cap_call_date= STR_TO_DATE('".$cap_call_date."','%d/%m/%Y'), cap_call_reference='".$cap_call_reference."', doc_storage='".$doc_storage."', cap_call_aprobo='".$cap_call_aprobo."', cap_note='".$cap_note."' WHERE cap_call=".$cap_call;
					elseif ($aud->m_op == 'B')				
						$sql = "DELETE FROM cap_calls WHERE cap_call=".$cap_call;
					$err = array();
					$primary_db->do_execute($sql, $err);
					if (count($err) > 0) 
						$res[] = "MENSAJE: Error en la actualizacion del audio.";			
				}
					
			}			
		
		}
		
		if (count($res) == 0)
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();						
		return $res;		
	}	

	
}


?>	
