<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "funciones/validar.php";

function iniciarCircuito($cir_code,$cir_date_ini,$cir_date_fin)
{ 
		global $primary_db, $sess;
		$res = array();
		$sql = "select * from cir_groups where cir_code=".$cir_code;
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar grupos de circuitos.";
				return $res;
		}		
		$primary_db->beginTransaction();
		while ($row = $primary_db->_fetch_row($out))
		{
		    $cirg_code = $row["cirg_code"];
		    $use_code_supervisor = $row["use_code_supervisor"];
			$oper_grupo = $row["oper_grupo"];
			$sql2 = "select * from oper_status where oper_grupo='".$oper_grupo."'";
			$out2 = $primary_db->do_execute($sql2, $err2);
			if (count($err2) != 0)
			{
					$res[] = "MENSAJE: Error al buscar los operadores del grupo $oper_grupo.";
			}		
			else
			{
				while ($row2 = $primary_db->_fetch_row($out2))
				{
					$use_code_operador = $row2["use_code"];
					$crit_status =  $primary_db->QueryString("SELECT crit_status FROM oper_status where use_code='".$use_code_operador."' limit 1");
					$crit_status_mon_sem =  intval($primary_db->QueryString("SELECT crit_status_mon_sem FROM crit_status where crit_status='".$crit_status."' limit 1"));
					$cirg_cant_mon_pendientes = 0;
					// Analizar Fechas
					error_log("Analizar Fechas $cir_date_ini,$cir_date_fin");
					$v = new validar();
					$dias = $v->diffFecha($cir_date_fin,$cir_date_ini);
					$d = 0;
					error_log("Analizar Fechas $dias");
					$cir_date = $cir_date_ini;
					while ($d < $dias)
					{
							for ($i=0;$i<$crit_status_mon_sem;$i++)
							{
								  error_log("insertar_monitoreo($cir_code,$cirg_code,$use_code_supervisor,$use_code_operador,$cir_date)");
								  $error = insertar_monitoreo($cir_code,$cirg_code,$use_code_supervisor,$use_code_operador,$cir_date); 	
								  if ($error != '') { $res[] = "MENSAJE: Error al insertar monitoreo"; break; }
								  $cirg_cant_mon_pendientes++;
							}
							$d = $d + 7;
							 
							$cir_date = $v->addDays($cir_date_ini,$d) ;
							error_log ("$cir_date = addDays($cir_date_ini,$d)");
					}
					$sql3 = "insert into cir_groups_oper (cirg_code,cir_code,use_code_operador,crit_status_ini,crit_status_fin,cirg_cant_mon_pendientes,";
					$sql3.= "cirg_cant_mon_realizados,cirg_cant_mon_ok,cirg_cant_mon_mal,cirg_cant_cap_pendientes,cirg_cant_cap_realizados,cirg_cant_cap_ok,cirg_cant_cap_mal,cirg_cant_mon_cierre_forz,cirg_calif_prom) ";
					$sql3.= " values ($cirg_code,$cir_code,$use_code_operador,'".$crit_status."','',".$cirg_cant_mon_pendientes.",";
					$sql3.= "0,0,0,0,0,0,0,0,0) ";
					$primary_db->do_execute($sql3, $err3);
					if (count($err3) > 0) {
						$res[]= "MENSAJE: Error al insertar el operador del grupo ($use_code_operador).";
					}
					
						
 				
				}
			}
		}
		if (count($res) == 0)
		{
			$sql = "update circuitos set cir_status='ACTIVO' where cir_code=".intval($cir_code);
			$primary_db->do_execute($sql, $err8);
			if (count($err8) > 0) {
				$res[] = "MENSAJE: Error al actualizar el circuito a ACTIVO.";
			}	
		}
		if (count($res) == 0) 
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();	
			
		return $res;
}
	
function insertar_monitoreo($cir_code,$cirg_code,$use_code_supervisor,$use_code_operador,$mon_date_aprox)
{
		global $primary_db,$sess;
		$error = "";
		$mon_code = $primary_db->Sequence("monitoreos");
		$sql = "insert into monitoreos (mon_code,cirg_code,cir_code,use_code_operador,use_code_supervisor,mon_date_aprox,mon_date,mon_status)";
		$sql.= " values ($mon_code,$cirg_code,$cir_code,$use_code_operador,$use_code_supervisor,STR_TO_DATE('$mon_date_aprox','%d/%m/%Y'),null,'PENDIENTE')";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) {
			$error= "MENSAJE: Error en el alta del monitoreo.";
		}else{
			$sql = "insert into mon_items (mon_code,it_code,it_name,it_order,it_importance,it_puntaje,it_aprobo,it_perjuicio_cliente,it_critico)";
			$sql.= " select $mon_code,it_code,it_name,it_order,it_importance,it_importance,'SI','NO',it_critico from items where it_status='ACTIVO' order by it_order";
			$primary_db->do_execute($sql, $err2);
			if (count($err2) > 0) 
				$error= "MENSAJE: Error en el alta de items de monitoreo.";  
		}
		return $error;
}	
function insertar_capacitacion($cir_code,$cirg_code,$mon_code,$use_code_supervisor,$use_code_operador,$doc_storage)	
{
		global $primary_db,$sess;
		$error = "";
		$cap_code = $primary_db->Sequence("capacitacion");
		$sql = "insert into capacitacion (cap_code,mon_code,cirg_code,cir_code,use_code_operador,use_code_supervisor,cap_date,cap_status,doc_storage)";
		$sql.= " values ($cap_code,$mon_code,$cirg_code,$cir_code,$use_code_operador,$use_code_supervisor,null,'PENDIENTE','$doc_storage')";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) {
			$error= "MENSAJE: Error en el alta del monitoreo.";
		}
		return $error;
}
function cerrarCircuito($cir_code)
{
		global $primary_db, $sess;
		$res = array();
		$sql = "select * from circuitos where cir_date_fin <= date(now()) and cir_code=".$cir_code;
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar el circuito a cerrar.";
				return $res;
		}			
		if ($row = $primary_db->_fetch_row($out))
		{
              if ($row["cir_status"]!='ACTIVO')
			 {
				$res[] = "MENSAJE: El circuito $cir_code no se pudo cerrar porque no estaba ACTIVO.";
				return $res;		
		      }			  
		}
		else
		{
				$res[] = "MENSAJE: El circuito $cir_code no se pudo cerrar porque no se cumplio la fecha de finalizacion.";
				return $res;		
		}
		$sql = "select * from cir_groups where cir_code=".$cir_code;
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar grupos de circuitos.";
				return $res;
		}		
		$primary_db->beginTransaction();

		while ($row = $primary_db->_fetch_row($out))
		{
		    $cirg_code = $row["cirg_code"];
		    $use_code_supervisor = $row["use_code_supervisor"];
			
			$sql2 = "select * from cir_groups_oper where cirg_code=".$cirg_code;
			$out2 = $primary_db->do_execute($sql2, $err2);
			if (count($err2) != 0)
					$res[] = "MENSAJE: Error al buscar los operadores del grupo $cirg_code.";
			else
			{
				while ($row2 = $primary_db->_fetch_row($out2))
				{
					$use_code_operador = $row2["use_code_operador"];
					$crit_status_ini = $row2["crit_status_ini"];
					$cirg_cant_mon_mal = intval($row2["cirg_cant_mon_mal"]);

					$s = "SELECT crit_oper_status_fin FROM criterios where crit_oper_status_ini=".intval($crit_status_ini);
					$s.= " and crit_cant_mal_desde<=".$cirg_cant_mon_mal." and crit_cant_mal_hasta>=".$cirg_cant_mon_mal." limit 1";				
					$crit_status_fin =  intval($primary_db->QueryString($s));
					if ($crit_status_fin==0) 
					  $res[]="MENSAJE: Error al buscar criterio para estado inicial $crit_status_ini y cant mal  $cirg_cant_mon_mal";
					else
					{
						$sql3 = "update cir_groups_oper set crit_status_fin='".$crit_status_fin."'";
					    $sql3.= " where cirg_code=".intval($cirg_code)." and use_code_operador=".intval($use_code_operador);
					    $primary_db->do_execute($sql3, $err3);
					    if (count($err3) > 0) 
						    $res[]= "MENSAJE: Error al actualizar el operador del grupo ($use_code_operador).";

						$sql3 = "update oper_status set crit_status='".$crit_status_fin."',oper_nuevo='NO' ";
					    $sql3.= " where use_code=".intval($use_code_operador);
					    $primary_db->do_execute($sql3, $err3);
					    if (count($err3) > 0)
						    $res[]= "MENSAJE: Error al actualizar el operador ($use_code_operador).";
					}
				}
			}			
		}
		/*
		if (count($res) == 0) 
		{
			$sql = "update monitoreos set mon_status='CERRADO' where mon_status='PENDIENTE' and cir_code=".intval($cir_code);
			$primary_db->do_execute($sql, $err8);
			if (count($err8) > 0) 
				$res[] = "MENSAJE: Error al actualizar los monitoreos a CERRADO.";			
		}
       */		
		if (count($res) == 0) 
		{
			$sql = "update circuitos set cir_status='CERRADO' where cir_code=".intval($cir_code);
			$primary_db->do_execute($sql, $err8);
			if (count($err8) > 0) 
				$res[] = "MENSAJE: Error al actualizar el circuito a CERRADO.";			
		}
		if (count($res) == 0) 
			$primary_db->commitTransaction();
		else
			$primary_db->rollbackTransaction();	
			
		return $res;
}
?>	