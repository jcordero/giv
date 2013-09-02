<?php
include_once "funciones/validar.php";
class ccircuitos_hooks extends cclass_maint_hooks
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
		$frm = $obj->m_parent;

		if (!( isset($frm) && ($frm->m_OP=="S" || $frm->m_OP=="M" || $frm->m_OP=="N"))) 
		                return $res;

		$cir_code = $obj->getField("cir_code")->getValue();
		$cir_date_ini = $obj->getField("cir_date_ini")->getValue();
		$cir_date_fin = $obj->getField("cir_date_fin")->getValue();
		$cir_status = $obj->getField("cir_status")->getValue();
		$cir_importance_min = $obj->getField("cir_importance_min")->getValue();
		if ($cir_status != 'PENDIENTE')
		{
				$res[] = "MENSAJE: Solo se pueden actualizar circuitos con estado PENDIENTE.";
				return $res;
		}
		$validar = new validar();	
		$dias =  $validar->compararFechas($cir_date_ini, date("d/m/Y"));
	    if ($validar->error!="")
		    $res[] =   "MENSAJE: Fecha de Inicio no valida.".$validar->error;						
		// if ($dias < 0)   $res[]= "MENSAJE: Fecha de Inicio debe ser mayor o igual a hoy.";	
		$dias =  $validar->compararFechas($cir_date_fin, $cir_date_ini);
		error_log("$dias =  validar::compararFechas($cir_date_fin, $cir_date_ini)");
		
	    if ($validar->error!="")
		    $res[] =   "MENSAJE: Fecha de Finalizacion no valida.".$validar->error;						
		 if ($dias <= 0)
			 $res[]= "MENSAJE: Fecha de Inicio debe ser menor a la de Finalizacion.";							 
		
		$sql = "select cir_name, cir_status from circuitos where cir_status != 'ANULADO' and cir_code<>$cir_code and 
			((STR_TO_DATE('".$cir_date_ini."','%d/%m/%Y') >= DATE(cir_date_ini) and STR_TO_DATE('".$cir_date_ini."','%d/%m/%Y') <= DATE(cir_date_fin)) or
			 (STR_TO_DATE('".$cir_date_fin."','%d/%m/%Y') >= DATE(cir_date_ini) and STR_TO_DATE('".$cir_date_fin."','%d/%m/%Y') <= DATE(cir_date_fin))) 
			";
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar un circuitos.";
				return $res;
		}		
		if ($row = $primary_db->_fetch_row($out))
		{
				$res[] = "MENSAJE: Ya existe un circuito que se superpone con el ingresado: (".$row["cir_name"].")";
				return $res;
		}
		$out = $primary_db->do_execute("delete from cir_semanas where cir_code=$cir_code", $err1);
		if (count($err1) != 0)
		{
			$res[] = "MENSAJE: Error al actualizar semanas del circuito.";
			return $res;
		}		
		$d = 0;
		while  ($d <= $dias)  
		{

				$cir_date = $validar->addDays($cir_date_ini,$d);	
				$d = $d + 7;
				$cir_date2 = $validar->addDays($cir_date_ini,$d);	
				$sql = "insert into cir_semanas (cir_code,cir_date,cir_date_ini,cir_date_fin) values ";
				$sql.= "($cir_code,STR_TO_DATE('".$cir_date."','%d/%m/%Y'),STR_TO_DATE('".$cir_date."','%d/%m/%Y'),STR_TO_DATE('".$cir_date2."','%d/%m/%Y'))  ";
				$out = $primary_db->do_execute($sql, $err2);
				if (count($err2) != 0)
				{
						$res[] = "MENSAJE: Error al calcular fechas del circuito.";
						return $res;
				}			
				$cir_date = $cir_date2;
				if ($d > $dias-7) break;
		}		
	
		return $res;
	}	
	public function afterSaveDB()
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
		$frm = $obj->m_parent;

		if (!( isset($frm) && ($frm->m_OP=="S" || $frm->m_OP=="M" || $frm->m_OP=="N"))) 
		                return $res;

		$cir_code = $obj->getField("cir_code")->getValue();
		$cir_date_ini = $obj->getField("cir_date_ini")->getValue();
		$cir_date_fin = $obj->getField("cir_date_fin")->getValue();
		$cir_status = $obj->getField("cir_status")->getValue();
		
		$validar = new validar();	
		$dias =  $validar->compararFechas($cir_date_ini, date("d/m/Y"));
	    if ($validar->error!="")
		    $res[] =   "MENSAJE: Fecha de Inicio no valida.".$validar->error;						
		// if ($dias < 0)   $res[]= "MENSAJE: Fecha de Inicio debe ser mayor o igual a hoy.";	
		$dias =  $validar->compararFechas($cir_date_fin, $cir_date_ini);
		error_log("$dias =  validar::compararFechas($cir_date_fin, $cir_date_ini)");
		
	    if ($validar->error!="")
		    $res[] =   "MENSAJE: Fecha de Finalizacion no valida.".$validar->error;						
		 if ($dias <= 0)
			 $res[]= "MENSAJE: Fecha de Inicio debe ser menor a la de Finalizacion.";					
		$out = $primary_db->do_execute("delete from cir_semanas where cir_code=$cir_code", $err1);
		if (count($err1) != 0)
		{
			$res[] = "MENSAJE: Error al actualizar semanas del circuito.";
			return $res;
		}		
		$d = 0;
		while  ($d <= $dias)  
		{

				$cir_date = $validar->addDays($cir_date_ini,$d);	
				$d = $d + 7;
				$cir_date2 = $validar->addDays($cir_date_ini,$d);	
				$sql = "insert into cir_semanas (cir_code,cir_date,cir_date_ini,cir_date_fin) values ";
				$sql.= "($cir_code,STR_TO_DATE('".$cir_date."','%d/%m/%Y'),STR_TO_DATE('".$cir_date."','%d/%m/%Y'),STR_TO_DATE('".$cir_date2."','%d/%m/%Y'))  ";
				$out = $primary_db->do_execute($sql, $err2);
				if (count($err2) != 0)
				{
						$res[] = "MENSAJE: Error al calcular fechas del circuito.";
						return $res;
				}			
				$cir_date = $cir_date2;
				// if ($d > $dias-7) break;
		}		
	
				return array($content, $res);
	}	
}


?>	
