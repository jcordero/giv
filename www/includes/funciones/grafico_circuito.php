<?php 
if(!class_exists('grafico_circuito'))
{
	class grafico_circuito
	{
	    public $tabla_monitoreos_grafico="";
		public $titulo_monitoreos_grafico="";	
		public $tabla_mon = "";
		public $tabla_cap = "";
	    public $filas = 0;	
	   public function graficar ($cir_code)
	   {
	        global $sess,$primary_db;
	     	$html ='<script src="/common/Highcharts-3/js/highcharts.js"></script>
			<script src="/common/Highcharts-3/js/modules/exporting.js"></script>';
			$this->tabla_mon="";
			$grafico = "";
			$this->filas = 0;
			if ($sess->haveRol($primary_db,"Administradores"))
			{
				   $this->monitoreos_tabla_adm($cir_code);
				   $grafico = $this->monitoreos_grafico($cir_code);
			}	   
			elseif ($sess->haveRol($primary_db,"supervisores"))
			{
				   $this->monitoreos_tabla_superv($cir_code);
				   $grafico = $this->monitoreos_grafico($cir_code);
			}			
			elseif ($sess->haveRol($primary_db,"operadores"))
			{
				   $this->monitoreos_tabla_oper($cir_code);
				   $grafico = $this->monitoreos_grafico($cir_code);
			}
			
			
			$html.= '<div><table><tr><td valign=top>'.$this->tabla_mon."<br>".$this->tabla_cap.'</td><td valign=top>'.$grafico.'</td></tr></table></div>';
			return $html;
	
	   }
   
	    private function monitoreos_tabla_oper ($cir_code)
		{
    		global $primary_db,$sess;
			$this->categorias = "[";
			$pendientes= array();			  
			$realizadas= array();
			$ok= array();
			$mal= array();
			$cerradas= array();
			
			$sql = "Select  distinct m.use_code_operador, use_name ,use_code_supervisor,cir_name, cir_date_ini, cir_date_fin,m.cir_code as cir_code
				FROM monitoreos m join circuitos c on c.cir_code = m.cir_code join sec_users on m.use_code_supervisor = sec_users.use_code
				where c.cir_code=".$cir_code." and m.use_code_operador=".$sess->user_id;

			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{		
			  
			   if ( $i>0) $this->categorias.=",";
			   $i++;
		       $this->categorias.="'".$row["use_name"]."'";		
			   $use_code_operador = $row["use_code_operador"];
			   $use_code_supervisor = $row["use_code_supervisor"];		
				$cir_code = $row["cir_code"];					   
			   $sql2 = "select count(*) from monitoreos where cir_code=$cir_code and use_code_operador=$use_code_operador and use_code_supervisor=$use_code_supervisor";
			   $pendientes[]= intval($primary_db->QueryString($sql2." and mon_status='PENDIENTE' "));		
			   $realizadas[]= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' "));	
			   $cerradas[]= intval($primary_db->QueryString($sql2." and mon_status='CERRADO' "));		
			   $ok[]= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' and mon_aprobo='SI'"));	
			   $mal[]= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' and mon_aprobo='NO'"));				   
			}
			$this->filas = $i;			
			$this->categorias.="]";		
			// Series realizados +  cerradas + pendientes				
			$this->series = "[";
			$this->series.= "{name: 'Pendientes',data: [";
			for ($i=0;$i<sizeof($pendientes);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $pendientes[$i];
			}			
			$this->series.= "]},";
			$this->series.= "{name: 'Desaprobadas',data: [";
			for ($i=0;$i<sizeof($mal);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $mal[$i];
			}
			$this->series.= "]},";		
			$this->series.= "{name: 'Aprobadas',data: [";
			for ($i=0;$i<sizeof($ok);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $ok[$i];
			}
			$this->series.= "]}";			
			$this->series.="]";

		}		
	    private function monitoreos_tabla_superv ($cir_code)
		{
    		global $primary_db,$sess;
			$this->tabla_mon = "<table width=500px align=center class='caja3'>";
			$this->tabla_cap = "<table width=500px align=center class='caja3'>";			
			$this->categorias = "[";
			$pendientes= array();			  
			$realizadas= array();
			$cerradas= array();
			// Obtener las semanas del circuito
			$t="";
			$cir_semana = array();
			$sql2 = "Select cir_semana, m.cir_code as cir_code, cir_name,  m.cir_date_ini as cir_date_ini, m.cir_date_fin as cir_date_fin
			from cir_semanas m join circuitos c on m.cir_code=c.cir_code where c.cir_code=".$cir_code." order by cir_semana ";
			$re2 = $primary_db->do_execute($sql2);
			$j=0;
			while($row2 = $primary_db->_fetch_row($re2))
			 {    
					   $cir_semana[] = $row2["cir_semana"];
					   $t.="<td bgcolor='#BBD9FC'><b>Sem ".$row2["cir_semana"]."</b></td>";
					   $j++;
					   if ($j==1)
					   {
						   $cir_code = $row2["cir_code"];
						   $cir_name = $row2["cir_name"];
						   $cir_date_ini = substr($row2["cir_date_ini"],0,10);					   
						   $cir_date_fin = substr($row2["cir_date_fin"],0,10);
					   }
					   
			}
			// TITULO -----			
			if 	($j > 1)
			$this->tabla_mon.= "<tr><td colspan=".(12+$j)." class=titulo>".$cir_name."</td></tr>";	
			else
		    $this->tabla_mon.= "<tr><td colspan=7 class=titulo>No hay circuito activos</td></tr>";	

				  
			$sql = "select distinct m.use_code_operador,use_name,use_login ,use_code_supervisor
				FROM monitoreos m join circuitos c on c.cir_code = m.cir_code join sec_users on m.use_code_operador = sec_users.use_code
				where m.cir_code=$cir_code and m.use_code_supervisor=".$sess->user_id." order by use_login ";

			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{		
		
			// Para la tabla
				if ($i==0)
				{		
				  $this->tabla_mon.= "<tr bgcolor='#4897f1'><td colspan=".(7+$j)."><b>Monitoreos</b></td></tr>";				 
				  $this->tabla_mon.= "<tr bgcolor='#98C5F8'><td> </td><td colspan=".(1+$j)." bgcolor='#BBD9FC'><b>Pendientes</b></td><td colspan=6> </td></tr>";
				  $this->tabla_mon.= "<tr bgcolor='#98C5F8'><td width='200px'>Operador</td>".$t."<td bgcolor='#BBD9FC'><b>Total</b></td><td>Realiz</td><td>Aprob</td><td>No Aprob</td><td>Cierre</td></tr>";
				}
				$i++;
				$use_code_operador = $row["use_code_operador"];
			    $use_code_supervisor = $row["use_code_supervisor"];						
				$uMon = WEB_PATH.'/lmodules/monitoreos/monitoreos_superv.php?OP=L&cir_code='.$cir_code.'&use_code_operador='.$use_code_operador.'&use_code_supervisor='.$use_code_supervisor;
			    $sql2 = "select count(*) from monitoreos where cir_code=$cir_code and use_code_operador=$use_code_operador and use_code_supervisor=$use_code_supervisor";	
				// $mon_puntaje = $primary_db->QueryString("select round(avg(ifnull(mon_puntaje,0)),2) from monitoreos where cir_code=$cir_code and mon_status='REALIZADO' and use_code_operador=$use_code_operador and use_code_supervisor=$use_code_supervisor");		  				
   				$i++;
				$t="";			
				foreach($cir_semana as $d)
				{
			       $cant_pendientes= intval($primary_db->QueryString($sql2." and mon_status='PENDIENTE'  and cir_semana=".intval($d)));		
				   $t.="<td bgcolor='#E8F3FF'><a href='".$sess->encodeURL($uMon."&mon_status=PENDIENTE&cir_semana=$d")."'>". $cant_pendientes ."</a></td>";
				}
				$pendientes1= intval($primary_db->QueryString($sql2." and mon_status='PENDIENTE' "));		
			    $realizadas1= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' "));	
			    $cerradas1= intval($primary_db->QueryString($sql2." and mon_status='CERRADO' "));		
			    $ok1= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' and mon_aprobo='SI'"));	
			    $mal1= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' and mon_aprobo='NO'"));	

				$this->tabla_mon.= "<tr bgcolor='#D6E6FA'><td nowrap>".substr($row["use_login"]." ".$row["use_name"],0,50)."</td>";
				$this->tabla_mon.=$t."<td bgcolor='#E8F3FF'><a href='".$sess->encodeURL($uMon."&mon_status=PENDIENTE")."'>".$pendientes1."</a></td><td>";	

				$uMon = WEB_PATH.'/lmodules/monitoreos/monitoreos.php?OP=L&cir_code='.$cir_code.'&use_code_operador='.$use_code_operador.'&use_code_supervisor='.$use_code_supervisor;
			
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=REALIZADO")."'>".$realizadas1."</a></td><td>";
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=REALIZADO&mon_aprobo=SI")."'>".$ok1."</a></td><td>";
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=REALIZADO&mon_aprobo=NO")."'>".$mal1."</a></td><td>";
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=CERRADO")."'>".$cerradas1."</a></td></tr>";
			
				// para graficos				
			   if ($this->categorias != "[") $this->categorias.=",";
		       $this->categorias.="'".$row["use_login"]."'";
			   $pendientes[]= $pendientes1;	
			   $realizadas[]= $realizadas1;	
			   $cerradas[]= $cerradas1;	
			}
			$this->filas = $i;			
			$this->categorias.="]";	
			// Series realizados +  cerradas + pendientes			
			$this->series = "[";
			$this->series.= "{name: 'Pendientes',data: [";
			for ($i=0;$i<sizeof($pendientes);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $pendientes[$i];
			}
			$this->series.= "]},";
			$this->series.= "{name: 'Cerradas',data: [";
			for ($i=0;$i<sizeof($cerradas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $cerradas[$i];
			}
			$this->series.= "]},";	
			$this->series.= "{name: 'Realizadas',data: [";
			for ($i=0;$i<sizeof($realizadas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $realizadas[$i];
			}			
	
			$this->series.= "]}";			
			$this->series.="]";
			// Capacitaciones --------------------------------------------------
			$sql = "select distinct m.use_code_operador,use_name,use_login ,use_code_supervisor
				FROM capacitacion m join circuitos c on c.cir_code = m.cir_code join sec_users on m.use_code_operador = sec_users.use_code
				where m.cir_code = $cir_code and m.use_code_supervisor=".$sess->user_id." order by use_login ";
			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{		
		
			// Para la tabla
				if ($i==0)
				{
				  $this->tabla_cap.= "<tr bgcolor='#a4d53a'><td colspan=5><b>Capacitaciones</b></td></tr>";
				  $this->tabla_cap.= "<tr bgcolor='#BED689'><td width='200px'>Operador</td><td bgcolor='#DFFC9F'><b>Pend.</b></td><td>Realiz</td></tr>";
				}
				$i++;			
				$use_code_operador = $row["use_code_operador"];
			    $use_code_supervisor = $row["use_code_supervisor"];		
			    $sql2 = "select count(*) from capacitacion where cir_code=$cir_code and use_code_operador=$use_code_operador and use_code_supervisor=$use_code_supervisor";	

				$pendientes1= intval($primary_db->QueryString($sql2." and cap_status='PENDIENTE' "));		
			    $realizadas1= intval($primary_db->QueryString($sql2." and cap_status='REALIZADO' "));		
				
				$this->tabla_cap.= "<tr bgcolor='#EDF7D7'><td nowrap>".substr($row["use_login"]." ".$row["use_name"],0,50)."</td>";	

				$uCap = WEB_PATH.'/lmodules/capacitacion/capacitacion_superv_pend.php?OP=L&cir_code='.$cir_code.'&use_code_supervisor='.$use_code_supervisor.'&use_code_operador='.$use_code_operador;		

				$this->tabla_cap.="<td bgcolor='#F6FEE5'><a href='".$sess->encodeURL($uCap)."'>".$pendientes1."</a></td><td>";
				
				$uCap = WEB_PATH.'/lmodules/capacitacion/capacitacion_superv.php?OP=L&cir_code='.$cir_code.'&use_code_supervisor='.$use_code_supervisor.'&use_code_operador='.$use_code_operador;			
			
				$this->tabla_cap.="<a href='".$sess->encodeURL($uCap."&cap_status=REALIZADO")."'>".$realizadas1."</a></td></tr>";
			}
			// FIN -----------------------------------------------------
			$this->tabla_mon.= "</table>";
			$this->tabla_cap.= "</table>";			

		}
		private function monitoreos_tabla_adm ($cir_code)
		{
    		global $primary_db,$sess;
			

			$this->tabla_mon = "<table width=500px  align=center class='caja3'>";
			$this->tabla_cap = "<table width=500px align=center class='caja3'>";
			$this->categorias = "[";
			$pendientes= array();			  
			$realizadas= array();
			$cerradas= array();
			
			// Obtener las semanas del circuito
			$t="";
			$cir_semana = array();
			$sql2 = "Select cir_semana,  m.cir_code as cir_code, cir_name, m.cir_date_ini as cir_date_ini, m.cir_date_fin as cir_date_fin
			from cir_semanas m join circuitos c on m.cir_code=c.cir_code where c.cir_code=".$cir_code."  order by cir_semana ";
			$re2 = $primary_db->do_execute($sql2);
			$j=0;
			while($row2 = $primary_db->_fetch_row($re2))
			 {    
					   $cir_semana[] = $row2["cir_semana"];
					   $t.="<td bgcolor='#BBD9FC'><b>Sem ".$row2["cir_semana"]."</b></td>";
					   $j++;
					   if ($j==1)
					   {
					    $cir_code = $row2["cir_code"];
					    $cir_name = $row2["cir_name"];
					    $cir_date_ini = substr($row2["cir_date_ini"],0,10);					   
					    $cir_date_fin = substr($row2["cir_date_fin"],0,10);
					   }
					   
			}
			if 	($j > 1)
		    $this->tabla_mon.= "<tr><td colspan=".(7+$j)." class=titulo>".$cir_name."</td></tr>";
			else
		    $this->tabla_mon.= "<tr><td colspan=7 class=titulo>No hay circuito activos</td></tr>";	
			// Datos del monitoreo
			$sql = "select distinct m.use_code_supervisor,use_name,use_login 
				FROM monitoreos m join circuitos c on c.cir_code = m.cir_code 
			    join sec_users on m.use_code_supervisor = sec_users.use_code
				where m.cir_code=$cir_code    order by use_login ";
				
			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{		
			
				// Para la tabla
				if ($i==0)
				{			
				  $this->tabla_mon.= "<tr bgcolor='#4897f1'><td colspan=".(7+$j)."><b>Monitoreos</b></td></tr>";
				  $this->tabla_mon.= "<tr bgcolor='#98C5F8'><td> </td><td colspan=".(1+$j)." bgcolor='#BBD9FC'><b>Pend</b></td><td colspan=6> </td></tr>";
				  $this->tabla_mon.= "<tr bgcolor='#98C5F8'><td  width='150px' nowrap >Grupo</td>".$t."<td bgcolor='#BBD9FC'><b>Total</b></td><td>Realiz</td><td>Aprob</td><td>No Aprob</td><td>Cierre</td></tr>";
				}
			    $use_code_supervisor = $row["use_code_supervisor"];						
				$uMon = WEB_PATH.'/lmodules/monitoreos/monitoreos_superv.php?OP=L&cir_code='.$cir_code.'&use_code_supervisor='.$use_code_supervisor;
			    $sql2 = "select count(*) from monitoreos where cir_code=$cir_code and use_code_supervisor=$use_code_supervisor";	
			  	// $mon_puntaje = $primary_db->QueryString("select round(avg(ifnull(mon_puntaje,0)),2) from monitoreos where cir_code=$cir_code and mon_status='REALIZADO'  and use_code_supervisor=$use_code_supervisor");		  				
   						
   				$i++;
				$t="";			
				foreach($cir_semana as $d)
				{
			       $cant_pendientes= intval($primary_db->QueryString($sql2." and mon_status='PENDIENTE'  and cir_semana=".intval($d)));		
				   $t.="<td bgcolor='#E8F3FF'><a href='".$sess->encodeURL($uMon."&mon_status=PENDIENTE&cir_semana=$d")."'>". $cant_pendientes ."</a></td>";
				}
				
				$pendientes1= intval($primary_db->QueryString($sql2." and mon_status='PENDIENTE' "));		
			    $realizadas1= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' "));	
			    $cerradas1= intval($primary_db->QueryString($sql2." and mon_status='CERRADO' "));		
			    $ok1= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' and mon_aprobo='SI'"));	
			    $mal1= intval($primary_db->QueryString($sql2." and mon_status='REALIZADO' and mon_aprobo='NO'"));	
				
			
				$this->tabla_mon.= "<tr bgcolor='#D6E6FA'><td>".$row["use_name"]."</td>";
				$this->tabla_mon.=$t."<td bgcolor='#E8F3FF'><a href='".$sess->encodeURL($uMon."&mon_status=PENDIENTE")."'>".$pendientes1."</a></td><td>";
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=REALIZADO")."'>".$realizadas1."</a></td><td>";
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=REALIZADO&mon_aprobo=SI")."'>". $ok1."</a></td><td>";
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=REALIZADO&mon_aprobo=NO")."'>".$mal1."</a></td><td>";
				$this->tabla_mon.="<a href='".$sess->encodeURL($uMon."&mon_status=CERRADO")."'>".$cerradas1."</a></td></tr>";

					// Para el grafico
			   if ($this->categorias != "[") $this->categorias.=",";
		       $this->categorias.="'".$row["use_name"]."'";
			   $ok[]= $ok1;	
			   $mal[]= $mal1;	
			   $pendientes[]= $pendientes1;	
			   $realizadas[]= $realizadas1;	
			   $cerradas[]= $cerradas1;	
			}
			$this->filas = $i;
			$this->categorias.="]";		
			// Series realizados +  cerradas + pendientes				
			$this->series = "[";
			$this->series.= "{name: 'Pendientes',data: [";
			for ($i=0;$i<sizeof($pendientes);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $pendientes[$i];
			}
			$this->series.= "]},";
			$this->series.= "{name: 'Cerradas',data: [";
			for ($i=0;$i<sizeof($cerradas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $cerradas[$i];
			}
			$this->series.= "]},";	
			$this->series.= "{name: 'Realizadas',data: [";
			for ($i=0;$i<sizeof($realizadas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $realizadas[$i];
			}			
	
			$this->series.= "]}";			
			$this->series.="]";
			// CAPACITACION ------------------------
// Datos del monitoreo
			$sql = "select distinct m.use_code_supervisor,use_name,use_login ,use_code_supervisor
				FROM capacitacion m join circuitos c on c.cir_code = m.cir_code join sec_users on m.use_code_supervisor = sec_users.use_code
				where m.cir_code=$cir_code  order by use_login ";
				
			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{					
				// Para la tabla
				if ($i==0)
				{
				  $this->tabla_cap.= "<tr bgcolor='#a4d53a'><td colspan=5><b>Capacitaciones</b></td></tr>";
				  $this->tabla_cap.= "<tr bgcolor='#BED689'><td width='200px'>Supervisor</td><td bgcolor='#DFFC9F'><b>Pend.</b></td><td>Realiz</td></tr>";
				}
				$i++;
			    $use_code_supervisor = $row["use_code_supervisor"];		
			    $sql2 = "select count(*) from capacitacion where cir_code=$cir_code  and use_code_supervisor=$use_code_supervisor";	

				$pendientes1= intval($primary_db->QueryString($sql2." and cap_status='PENDIENTE' "));		
			    $realizadas1= intval($primary_db->QueryString($sql2." and cap_status='REALIZADO' "));		
			  //  $ok1= intval($primary_db->QueryString($sql2." and cap_status='REALIZADO' and cap_rol_play_aprobado='SI'"));	
			  //  $mal1= intval($primary_db->QueryString($sql2." and cap_status='REALIZADO' and cap_rol_play_aprobado='NO'"));				
				$this->tabla_cap.= "<tr bgcolor='#EDF7D7'><td nowrap>".substr($row["use_name"],0,50)."</td>";	

				$uCap = WEB_PATH.'/lmodules/capacitacion/capacitacion_superv_pend.php?OP=L&cir_code='.$cir_code.'&use_code_supervisor='.$use_code_supervisor;	
				$this->tabla_cap.="<td bgcolor='#F6FEE5'><a href='".$sess->encodeURL($uCap)."'>".$pendientes1."</a></td><td>";
				
				$uCap = WEB_PATH.'/lmodules/capacitacion/capacitacion_superv.php?OP=L&cir_code='.$cir_code.'&use_code_supervisor='.$use_code_supervisor;	
			
				$this->tabla_cap.="<a href='".$sess->encodeURL($uCap."&cap_status=REALIZADO")."'>".$realizadas1."</a></td></tr>";
				
			}			
			$this->tabla_mon.= "</table>";
			$this->tabla_cap.= "</table>";
			
		}
				
		private function monitoreos_grafico ($cir_code)
		{
		
		$alto = 200 + ($this->filas)*15;
		error_log(__FILE__."monitoreos_grafico ALTO ".$alto. " FILAS ". $this->filas);
		$html = "
		<script type=\"text/javascript\">
		$(function () {
        $('#container').highcharts({
            chart: {
				height: ".$alto.",	
				width: 440,				
                type: 'bar'
            },

            title: {
                text: 'Estado Actual de Monitoreos'
            },
            xAxis: {
                categories: ".$this->categorias."
			},
            yAxis: {
                min: 0,
                title: {
                    text: 'Total de Monitoreos'
                }
            },
            legend: {
                backgroundColor: '#FFFFFF',
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: ".$this->series."
        });
    });
    

		</script>
		<div id='container' style='width: 500px; height:".$alto."px margin: 0 auto'></div>";	
			return $html;
		}		
				
		private function fetchRow($sql) 
		{
			global $primary_db;
			$rs = $primary_db->do_execute($sql);
			if($rs) 
			{
				if( $row = $primary_db->_fetch_row($rs,0) )
				{
					return $row;
				}
			}
			return array();
		}
		
	}
}

?>	
