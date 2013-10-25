<?php
include_once "funciones/validar.php";
class ccircuitos_hooks extends cclass_maint_hooks
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
		$frm = $obj->m_parent;

		if (!( isset($frm) && ($frm->m_OP=="S" || $frm->m_OP=="M" || $frm->m_OP=="N"))) 
		                return $res;

		$cir_code = $obj->getField("cir_code")->getValue();
		$cir_name = $obj->getField("cir_name")->getValue();
		$cir_date_ini = $obj->getField("cir_date_ini")->getValue();
		$cir_date_fin = $obj->getField("cir_date_fin")->getValue();
		$cir_status = $obj->getField("cir_status")->getValue(); 
		$cir_semanas = $obj->getField("cir_semanas")->getValue(); 
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
		
		$primary_db->beginTransaction();
		$cir_code = $primary_db->Sequence("circuitos");	
		$sql = "select cir_name, cir_status from circuitos where cir_status <> 'ANULADO' and cir_code<>$cir_code and 
			((STR_TO_DATE('".$cir_date_ini."','%d/%m/%Y') >= DATE(cir_date_ini) and STR_TO_DATE('".$cir_date_ini."','%d/%m/%Y') <= DATE(cir_date_fin)) or
			 (STR_TO_DATE('".$cir_date_fin."','%d/%m/%Y') >= DATE(cir_date_ini) and STR_TO_DATE('".$cir_date_fin."','%d/%m/%Y') <= DATE(cir_date_fin))) 
			";
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar un circuitos.";
		}		
		elseif ($row = $primary_db->_fetch_row($out))
		{
				$res[] = "MENSAJE: Ya existe un circuito que se superpone con el ingresado: (".$row["cir_name"].")";
		}else{
			$out = $primary_db->do_execute("delete from cir_semanas where cir_code=$cir_code", $err1);
			if (count($err1) != 0)
			{
				$res[] = "MENSAJE: Error al actualizar semanas del circuito.";
			}		
		}
		if (count($res) == 0) {

			$err2 = array();
			$sql = "insert into circuitos (cir_code,cir_name,cir_semanas,cir_date_ini,cir_date_fin,cir_importance_min,cir_status) values ";
			$sql.= "($cir_code,'".$cir_name."',$cir_semanas, STR_TO_DATE('".$cir_date_ini."','%d/%m/%Y'),STR_TO_DATE('".$cir_date_fin."','%d/%m/%Y'),$cir_importance_min,'$cir_status')  ";		
			$out = $primary_db->do_execute($sql, $err2);
			if (count($err2) != 0)
			{
				$res[] = "MENSAJE: Error al calcular fechas del circuito.";
			}	
		}
		if (count($res) == 0) {		
			$d = 0;
			$sem = 0;
			while  (($d <= $dias)  && ($sem < $cir_semanas))
			{
				$sem++;
				$cir_date1 = $validar->addDays($cir_date_ini,$d);	
				$d1 = $d+3;
				$cir_date = $validar->addDays($cir_date_ini,$d1);
				$d = $d + 7;
				$cir_date2= $validar->addDays($cir_date_ini,$d);	
				$err2 = array();
				$sql = "insert into cir_semanas (cir_code,cir_date,cir_date_ini,cir_date_fin,cir_semana) values ";
				$sql.= "($cir_code,STR_TO_DATE('".$cir_date."','%d/%m/%Y'),STR_TO_DATE('".$cir_date1."','%d/%m/%Y'),STR_TO_DATE('".$cir_date2."','%d/%m/%Y'),$sem)  ";
				$out = $primary_db->do_execute($sql, $err2);
				if (count($err2) != 0)
				{
						$res[] = "MENSAJE: Error al calcular fechas del circuito.";
						return $res;
				}			

				if ($d > $dias-7) break;
			}
	
			if ($sem != $cir_semanas)
			{
				$res[] = "MENSAJE: Las fechas del circuito no corresponden a la cantidad de semanas asignadas.";
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
