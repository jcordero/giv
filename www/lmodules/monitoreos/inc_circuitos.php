<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
function iniciarCircuito($cir_code)
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
			$sql2 = "select * from cir_groups_oper where cirg_code=".$cirg_code;
			$out2 = $primary_db->do_execute($sql2, $err2);
			if (count($err2) != 0)
			{
					$res[] = "MENSAJE: Error al buscar los operadores del grupo $cirg_code.";
			}		
			else
			{
				while ($row2 = $primary_db->_fetch_row($out2))
				{
					$use_code_operador = $row2["use_code_operador"];
					$crit_status =  $primary_db->QueryString("SELECT crit_status FROM oper_status where use_code='".$use_code_operador."' limit 1");
					$crit_status_mon_sem =  $primary_db->QueryString("SELECT crit_status_mon_sem FROM crit_status where crit_status='".$crit_status."' limit 1");
					$sql3 = "update cir_groups_oper set ";
					$sql3.= "crit_status_ini='".$crit_status."',";
					$sql3.= "crit_status_fin='',";
					$sql3.= "cirg_cierre_forzado='NO',";
					$sql3.= "cirg_cierre_motivo='',";     
					$sql3.= "cirg_cant_mon_pendientes=".intval($crit_status_mon_sem).", ";
					$sql3.= "cirg_cant_mon_realizados=0, ";
					$sql3.= "cirg_cant_mon_ok=0, ";
					$sql3.= "cirg_cant_mon_mal=0";
					$sql3.= " where cirg_code=".intval($cirg_code)." and use_code_operador=".intval($use_code_operador);
					$primary_db->do_execute($sql3, $err3);
					if (count($err3) > 0) {
						$res[]= "MENSAJE: Error al actualizar el operador del grupo ($use_code_operador).";
					}
					else
					{
					    for ($i=0;$i<$crit_status_mon_sem;$i++)
						{
                              $error = insertar_monitoreo($cir_code,$cirg_code,$use_code_supervisor,$use_code_operador); 	
							  if ($error != '') { $res[] = "MENSAJE: Error al insertar monitoreo"; break; }
						}
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
	
function insertar_monitoreo($cir_code,$cirg_code,$use_code_supervisor,$use_code_operador)
{
		global $primary_db,$sess;
		$error = "";
		$mon_code = $primary_db->Sequence("monitoreos");
		$sql = "insert into monitoreos (mon_code,cirg_code,cir_code,use_code_operador,use_code_supervisor,mon_date,mon_status)";
		$sql.= " values ($mon_code,$cirg_code,$cir_code,$use_code_operador,$use_code_supervisor,null,'PENDIENTE')";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) {
			$error= "MENSAJE: Error en el alta del monitoreo.";
		}else{
			$sql = "insert into mon_items (mon_code,it_code,it_name,it_order,it_importance,it_puntaje,it_aprobo,it_perjuicio_cliente)";
			$sql.= " select $mon_code,it_code,it_name,it_order,it_importance,it_importance,'NO','SI' from items where it_status='ACTIVO' order by it_order";
			$primary_db->do_execute($sql, $err2);
			if (count($err2) > 0) 
				$error= "MENSAJE: Error en el alta de items de monitoreo.";  
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

		if (count($res) == 0) 
		{
			$sql = "update monitoreos set mon_status='CERRADO' where mon_status='PENDIENTE' and cir_code=".intval($cir_code);
			$primary_db->do_execute($sql, $err8);
			if (count($err8) > 0) 
				$res[] = "MENSAJE: Error al actualizar los monitoreos a CERRADO.";			
		}		
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