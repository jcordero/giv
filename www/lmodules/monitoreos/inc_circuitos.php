<?php
set_time_limit(3600);
error_log("ENTRO A:".__FILE__);
include_once "funciones/validar.php";

function iniciarCircuito($cir_code,$cir_date_ini,$cir_date_fin)
{ 
		global $primary_db, $sess;
		$cir_code_ant = intval($primary_db->QueryString("SELECT max(cir_code) FROM circuitos where cir_status='CERRADO'"));
		error_log( "iniciarCircuito($cir_code,$cir_date_ini,$cir_date_fin,$cir_code_ant)");
		$res = array();
		$sql = "select * from cir_groups where cir_code=".$cir_code;
		$out = $primary_db->do_execute($sql, $err);
		if (count($err) != 0)
		{
				$res[] = "MENSAJE: Error al buscar grupos de circuitos.";
				return $res;
		}		
		$primary_db->beginTransaction();
		$i = 0;
		while ($row = $primary_db->_fetch_row($out))
		{
		    $cirg_code = $row["cirg_code"];
		    $use_code_supervisor = $row["use_code_supervisor"];
			$oper_grupo = $row["oper_grupo"];
			$sql2 = "select * from oper_status where oper_grupo='".$oper_grupo."' and oper_status='ACTIVO'";
			$out2 = $primary_db->do_execute($sql2, $err2);
			if (count($err2) != 0)
			{
					$res[] = "MENSAJE: Error al buscar los operadores del grupo $oper_grupo.";
			}		
			else
			{
				while ($row2 = $primary_db->_fetch_row($out2))
				{
				    $i++;
					$use_code_operador = $row2["use_code"];
					$semanas = 0;
					if ($oper_grupo == 'Nuevos')
					{
					   $cant_sem = intval($primary_db->QueryString("SELECT count(distinct cir_semana) FROM monitoreos where cir_code=".intval($cir_code_ant)." and use_code_operador='".$use_code_operador."'"));
					   
					   if ($cant_sem == 0) {
					       $semanas = 2;
					   }elseif ($cant_sem == 1) {
                           $semanas = 1;					   
					   }else {
					      $res[] = "MENSAJE: Error El operador nro $use_code_operador pertenece al grupo $oper_grupo y ya tiene $cant_sem semanas de monitoreos asignadas en el circuito anterior.";
						  $semanas = 0;	
					   }	
					   error_log("use_code_operador:$use_code_operador semanas:$semanas cant_sem:$cant_sem");
					}
					$crit_status =  $primary_db->QueryString("SELECT crit_status FROM oper_status where use_code='".$use_code_operador."' limit 1");
					$error =  insertar_operador_en_circuito($cir_code,$oper_grupo,$use_code_supervisor,$use_code_operador,$crit_status,$semanas,true);
					if ($error != "")
					{
						$res[] = "MENSAJE: ".$error ;					
					    break;
					}
				}
			}
		}
		if ($i == 0)
		{
			$res[] = "MENSAJE: No se asignaron operadores, revise si el circuito tiene grupos asignados.";
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
function del_monitoreo($cir_code,$mon_date_aprox,$use_code_operador,$cant)	
{
		global $primary_db,$sess;
		$error = "";
		$sql = "delete from monitoreos where mon_date_aprox = STR_TO_DATE('".$mon_date_aprox."','%d/%m/%Y') and use_code_operador=$use_code_operador and cir_code=$cir_code and mon_status='PENDIENTE' limit $cant";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) {
			$error= "MENSAJE: Error al eliminar monitoreos.";
		}
		return $error;
}	
function insertar_monitoreo($cir_code,$use_code_supervisor,$use_code_operador,$mon_date_aprox,$cir_semana)
{
		global $primary_db,$sess;
		$error = "";
		$mon_code = $primary_db->Sequence("monitoreos");
		$sql = "insert into monitoreos (mon_code,cir_code,use_code_operador,use_code_supervisor,mon_date_aprox,mon_date,mon_status,cir_semana)";
		$sql.= " values ($mon_code,$cir_code,$use_code_operador,$use_code_supervisor,STR_TO_DATE('".$mon_date_aprox."','%d/%m/%Y'),null,'PENDIENTE',".intval($cir_semana).")";
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

function del_capacitacion($cir_code,$mon_code,$use_code_operador, $cant)	
{
		global $primary_db,$sess;
		$error = "";
		$sql = "delete from capacitacion where mon_code = $mon_code and cir_code=$cir_code and cap_status='PENDIENTE' and use_code_operador=$use_code_operador limit $cant ";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) {
			$error= "MENSAJE: Error al eliminar capacitaciones.";
		}
		return $error;
}	
function insertar_capacitacion($cir_code,$mon_code,$use_code_supervisor,$use_code_operador,$doc_storage)	
{
		global $primary_db,$sess;
		$error = "";
		$cap_code = $primary_db->Sequence("capacitacion");
		$sql = "insert into capacitacion (cap_code,mon_code,cir_code,use_code_operador,use_code_supervisor,cap_date,cap_status,doc_storage)";
		$sql.= " values ($cap_code,$mon_code,$cir_code,$use_code_operador,$use_code_supervisor,null,'PENDIENTE','$doc_storage')";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) {
			$error= "MENSAJE: Error en el alta de capacitacion.";
		}
		return $error;
}
function cerrarCircuito($cir_code)
{
		global $primary_db, $sess;
		$res = array();
		$sql = "select * from circuitos where date(cir_date_fin) <= date(now()) and cir_code=".$cir_code;
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
    	// Actualizar estado de operadores	
		$error = actualizarCirOper ($cir_code);
	    if ($error !='')
		{
				$res[] = "MENSAJE: ".$error;
				return $res;		
		}		
		// No evaluar desempe de operadores en el grupo NUEVOS
		$sql2 = "select * from cir_oper where cir_code=".$cir_code." and use_code_operador not in (select use_code  from oper_status where oper_grupo = 'Nuevos')";
		$out2 = $primary_db->do_execute($sql2, $err2);
		if (count($err2) != 0)
					$res[] = "MENSAJE: Error al buscar los operadores del circuito $cir_code.";
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
						$sql3 = "update cir_oper set crit_status_fin='".$crit_status_fin."'";
					    $sql3.= " where cir_code=".intval($cir_code)." and use_code_operador=".intval($use_code_operador);
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

function mover_operador_en_circuito($cir_code,$oper_grupo_ant,$oper_grupo_act,$use_code_oper)
{
	global $primary_db,$sess;
	$error = "";
	$cirg_code_ant = $primary_db->QueryString("select cirg_code from cir_groups where oper_grupo='$oper_grupo_ant' and cir_code=".$cir_code);
	if ($cirg_code_ant == "")
		return "El grupo actual del operador no esta asignado al circuito activo.";

	$cirg_code_act = $primary_db->QueryString("select cirg_code from cir_groups where oper_grupo='$oper_grupo_act' and cir_code=".$cir_code);
	if ($cirg_code_act == "")
		return "El grupo seleccionado no esta asignado al circuito activo. Asigne el grupo al circuito si desea incorporar al operador";

	$use_code_supervisor = $primary_db->QueryString("select use_code_supervisor from cir_groups where cirg_code='$cirg_code_act' and cir_code=".$cir_code);	
	if ($use_code_supervisor == "")
		return "El grupo seleccionado no tiene asignado un supervisor en el circuito activo. Asigne el grupo al circuito correctamente si desea incorporar al operador";
	// Actualizar monitoreos
	$sql = "update monitoreos set use_code_supervisor = $use_code_supervisor where cir_code=$cir_code and use_code_operador=$use_code_oper and  mon_status='PENDIENTE' ";
			
	$primary_db->do_execute($sql, $err);
	if (count($err) > 0) 
			$error= "Error al actualizar los monitoreos pendientes.";
	else
	{
		// Actualizar capacitacion
		$sql = "update capacitacion set  use_code_supervisor = $use_code_supervisor where cir_code=$cir_code and use_code_operador=$use_code_oper and  cap_status='PENDIENTE' ";
		$primary_db->do_execute($sql, $err2);
		if (count($err2) > 0) 
				$error= "Error al actualizar los capacitaciones pendientes.";
	
	}
	return $error;
}

function insertar_operador_en_circuito($cir_code,$oper_grupo_act,$use_code_supervisor,$use_code_operador,$crit_status,$semanas,$completo=false)
{	global $primary_db,$sess;
	$error = "";
	$esta = $primary_db->QueryString("select 1 from cir_oper where cir_code=".$cir_code." and use_code_operador =".$use_code_operador );
	if ($esta == "")
	{
		$sql3 = "insert into cir_oper (cir_code,use_code_operador,crit_status_ini,crit_status_fin,cirg_cant_mon_pendientes,";
		$sql3.= "cirg_cant_mon_realizados,cirg_cant_mon_ok,cirg_cant_mon_mal,cirg_cant_cap_pendientes,cirg_cant_cap_realizados,cirg_cant_cap_ok,cirg_cant_cap_mal,cirg_cant_mon_cierre_forz,cirg_puntaje_prom) ";
		$sql3.= " values ($cir_code,$use_code_operador,'".$crit_status."','',0,0,0,0,0,0,0,0,0,0) ";
		$primary_db->do_execute($sql3, $err3);
		if (count($err3) > 0) {
				return  "Error al insertar el operador del grupo ($use_code_operador).";
		}
	}

	$error = insertar_monitoreos_en_circuito($cir_code,$oper_grupo_act,$use_code_supervisor,$use_code_operador,$crit_status,$semanas,$completo);
	return $error;
}	

function insertar_monitoreos_en_circuito($cir_code,$oper_grupo_act,$use_code_supervisor,$use_code_operador,$crit_status,$semanas=0,$completo)
{	global $primary_db;
	$cirg_cant_mon_pendientes = 0;
	$error = "";
	$crit_status_mon_sem =  intval($primary_db->QueryString("SELECT crit_status_mon_sem FROM crit_status where crit_status='".$crit_status."' limit 1"));
	if ($crit_status_mon_sem == 0)
		return "El criterio asignado al operador no tiene monitoreos por semana.";	
		
	// Analizar Fechas de acuerdo al circuito
	$j = 0;
	if ($completo)
	{
	  $sql2 = "select DATE_FORMAT(cir_date,'%d/%m/%Y') as cir_date,cir_semana from cir_semanas where cir_code=".$cir_code ;
	}
	else
	{
	// A partir de la fecha
	  $sql2 = "select DATE_FORMAT(cir_date,'%d/%m/%Y') as cir_date,cir_semana from cir_semanas where cir_code=".$cir_code." and cir_date >=  date(now()) order by cir_code,cir_date asc" ;

	}
	$out2 = $primary_db->do_execute($sql2, $err2);
	if (count($err2) != 0)
					$error = "Error al buscar las fechas del circuito $cir_code.";
	else {
		while ( ($row2 = $primary_db->_fetch_row($out2)) && ($error ==''))	{
	        $cirg_cant_mon_pendientes=$cirg_cant_mon_pendientes+$crit_status_mon_sem;
			for ($i=0;$i<$crit_status_mon_sem;$i++)	{
				$error = insertar_monitoreo($cir_code,$use_code_supervisor,$use_code_operador,$row2["cir_date"],$row2["cir_semana"]); 	
				if ($error != '')  break; 			  
			}
			$j++;
			if (($semanas > 0) && ($j==$semanas)) break;
		}
	
	/* -----------------------------------------------------------------------------------------------------------
	if (($semanas > 0) && ($j<$semanas)){
	    while ( $j<$semanas )	{
			// Agregar una semana
	        $sql2 = "select DATE_FORMAT(DATE_ADD(max(cir_date), INTERVAL 7 DAY),'%d/%m/%Y') as cir_date from cir_semanas where cir_code=".$cir_code;
			$out2 = $primary_db->do_execute($sql2, $err2);
			if (count($err2) != 0)
			{
					$error = "Error al buscar las fechas del circuito $cir_code.";
					return $error;
			}
			if ( ($row2 = $primary_db->_fetch_row($out2)) && ($error ==''))	{
					$cir_date = $row2["cir_date"];
					$sql = "insert into cir_semanas (cir_code,cir_date,cir_date_ini,cir_date_fin) values ";
					$sql.= "($cir_code,STR_TO_DATE('".$cir_date."','%d/%m/%Y'),STR_TO_DATE('".$cir_date."','%d/%m/%Y'),DATE_ADD(STR_TO_DATE('".$cir_date."','%d/%m/%Y'), INTERVAL 7 DAY))   ";
					$out = $primary_db->do_execute($sql, $err2);
					if (count($err2) != 0)
					{
							$error = "Error al calcular fechas del circuito.";
							return $error;
					}							
					$cirg_cant_mon_pendientes=$cirg_cant_mon_pendientes+$crit_status_mon_sem;
					for ($i=0;$i<$crit_status_mon_sem;$i++)	{
						$error = insertar_monitoreo($cir_code,$use_code_supervisor,$use_code_operador,$cir_date); 	
						if ($error != '')  break; 			  
					}
					$j++;				
			}
		}
	  NOOO Tengo que insertar mas semanas */
	  

		$sql = "update cir_oper set cirg_cant_mon_pendientes=ifnull(cirg_cant_mon_pendientes,0)+".$cirg_cant_mon_pendientes." where cir_code= $cir_code and  use_code_operador=$use_code_operador ";
		$primary_db->do_execute($sql, $err);
		if (count($err) > 0) {
				$error =  "Error al actualizar el operador del grupo ($use_code_operador).";
		}	
	}
	return $error;
}	

function actualizarCirOper ($cir_code)
{
    global $primary_db,$sess;
	$error="";
	$sql1= "select count(*) from capacitacion where cir_code=$cir_code and capacitacion.use_code_operador=cir_oper.use_code_operador";
	$sql2= "select count(*) from monitoreos where cir_code=$cir_code and monitoreos.use_code_operador=cir_oper.use_code_operador";
	 
	$sql = "update cir_oper set ";
	$sql.= " cirg_cant_mon_pendientes=ifnull((".$sql2." and mon_status='PENDIENTE' ),0), ";
	$sql.= " cirg_cant_mon_realizados=ifnull((".$sql2." and mon_status='REALIZADO' ),0), ";
	$sql.= " cirg_cant_mon_ok=ifnull((".$sql2." and mon_status='REALIZADO' and mon_aprobo='SI' ),0), ";
	$sql.= " cirg_cant_mon_mal=ifnull((".$sql2." and mon_status='REALIZADO' and mon_aprobo='NO' ),0), ";
	$sql.= " cirg_puntaje_prom=ifnull((select round(avg(ifnull(mon_puntaje,0)),2) from monitoreos where cir_code=$cir_code and monitoreos.use_code_operador=cir_oper.use_code_operador and mon_status='REALIZADO' ),0), ";		
	$sql.= " cirg_cant_mon_cierre_forz=ifnull((".$sql2." and mon_status='CERRADO' ),0), ";	
	$sql.= " cirg_cant_cap_pendientes=ifnull((".$sql1." and cap_status='PENDIENTE'),0), ";
	$sql.= " cirg_cant_cap_realizados=ifnull((".$sql1." and cap_status='REALIZADO' ),0), ";
	$sql.= " cirg_cant_cap_ok=ifnull((".$sql1." and cap_status='REALIZADO' and cap_rol_play_aprobado='SI' ),0), ";
	$sql.= " cirg_cant_cap_mal=ifnull((".$sql1." and cap_status='REALIZADO' and cap_rol_play_aprobado='NO' ),0) where cir_code=$cir_code ";	
	$primary_db->do_execute($sql, $err3);
	if (count($err3) > 0) $error = "Error al actualizar el estado de los operadores en el circuito.";
	return $error;
				
}

?>	