<?php 
/* Pantalla inicial para el operador de denu cgpc
 */
if(!class_exists('home_default'))
{
    include_once "common/cfield.php";

	class home_default
	{
	    public $tabla_monitoreos_grafico="";
		public $titulo_monitoreos_grafico="";	
		public function Render($context)
		{
			global $sess,$primary_db;
			$html ='<script src="/common/Highcharts-3/js/highcharts.js"></script>
			<script src="/common/Highcharts-3/js/modules/exporting.js"></script>';
			
			if ($sess->haveRol($primary_db,"Administradores"))
			{
				   $this->monitoreos_tabla_adm();
				   $grafico = $this->monitoreos_grafico();
			}	   
			elseif ($sess->haveRol($primary_db,"Supervisores"))
			{
				   $this->monitoreos_tabla_superv();
				   $grafico = $this->monitoreos_grafico();
			}			
			elseif ($sess->haveRol($primary_db,"Operadores"))
			{
				   $this->monitoreos_tabla_oper();
				   $grafico = $this->monitoreos_grafico();
			}
			
			// $url_proveedor = $sess->encodeURL( WEB_PATH.'/lmodules/proveedores1/proveedores.php?OP=L' );

							
			
			$html.= '
			    <table width=100% align=center height=100% cellspacing="0px" >
				<tr><td>
		           <table width=100% height=140px bgcolor="#ffffff" style="padding-top: 15px;">
				   <tr><td align="center">
				    <table  width=90% height="100%">
					<tr valign="top" align="center">'.$grafico.'</tr>
					<tr align="center" height="100%">'.$iconos.'</tr>					
					</table>
					</td></tr>
					</table>';
			
			$content["home_default"] = $html;
			return array( $content, array() );
		}
	   private function monitoreos_tabla_oper ()
		{
    		global $primary_db,$sess;
			$this->categorias = "[";
			$pendientes= array();			  
			$realizadas= array();
			$ok= array();
			$mal= array();
			$cerradas= array();
			$sql = "Select co.use_code_operador,use_name,use_code_supervisor,cir_name, cir_date_ini, cir_date_fin,
			    sum(cirg_cant_mon_pendientes) as cirg_cant_mon_pendientes, sum(cirg_cant_mon_realizados) as cirg_cant_mon_realizados, 
				sum(cirg_cant_mon_ok) as cirg_cant_mon_ok, 
				sum(cirg_cant_mon_mal) as cirg_cant_mon_mal, sum(cirg_cant_cap_pendientes) as cirg_cant_cap_pendientes, 
				sum(cirg_cant_cap_realizados) as cirg_cant_cap_realizados, sum(cirg_cant_cap_ok) as cirg_cant_cap_ok,
				sum(cirg_cant_cap_mal) as cirg_cant_cap_mal, sum(cirg_cant_mon_cierre_forz) as cirg_cant_mon_cierre_forz,
				round(avg(ifnull(cirg_puntaje_prom,0)),2) as cirg_puntaje_prom
				FROM cir_groups_oper co join cir_groups cg on co.cirg_code = cg.cirg_code join circuitos c on c.cir_code = co.cir_code join sec_users
				on co.use_code_operador = sec_users.use_code
				where cir_status='ACTIVO' and co.use_code_operador=".$sess->user_id." group by co.use_code_operador,use_name,use_code_supervisor,cir_name, cir_date_ini, cir_date_fin";
			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{		
			   $i++;
			   if ($this->categorias != "[") $this->categorias.=",";
		       $this->categorias.="'".$row["use_name"]."'";
			   
			   $pendientes[]= intval($row["cirg_cant_mon_pendientes"]);	
			   $realizadas[]= intval($row["cirg_cant_mon_realizados"]);	
			   $cerradas[]= intval($row["cirg_cant_mon_cierre_forz"]);	
			   $ok[]= intval($row["cirg_cant_mon_ok"]);	
			   $mal[]= intval($row["cirg_cant_mon_mal"]);				   
			}
			$this->categorias.="]";			
			$this->series = "[";
			$this->series.= "{name: 'Aprobadas',data: [";
			for ($i=0;$i<sizeof($ok);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $ok[$i];
			}
			$this->series.= "]},";
			$this->series.= "{name: 'Desaprobadas',data: [";
			for ($i=0;$i<sizeof($mal);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $mal[$i];
			}
			$this->series.= "]},";		
			$this->series.= "{name: 'Pendientes',data: [";
			for ($i=0;$i<sizeof($pendientes);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $pendientes[$i];
			}
			$this->series.= "]}";			
			$this->series.="]";

		}		
	    private function monitoreos_tabla_superv ()
		{
    		global $primary_db,$sess;
			$this->categorias = "[";
			$pendientes= array();			  
			$realizadas= array();
			$cerradas= array();
			$sql = "Select co.use_code_operador,use_name,use_code_supervisor,cir_name, cir_date_ini, cir_date_fin,
			    sum(cirg_cant_mon_pendientes) as cirg_cant_mon_pendientes, sum(cirg_cant_mon_realizados) as cirg_cant_mon_realizados, 
				sum(cirg_cant_mon_ok) as cirg_cant_mon_ok, 
				sum(cirg_cant_mon_mal) as cirg_cant_mon_mal, sum(cirg_cant_cap_pendientes) as cirg_cant_cap_pendientes, 
				sum(cirg_cant_cap_realizados) as cirg_cant_cap_realizados, sum(cirg_cant_cap_ok) as cirg_cant_cap_ok,
				sum(cirg_cant_cap_mal) as cirg_cant_cap_mal, sum(cirg_cant_mon_cierre_forz) as cirg_cant_mon_cierre_forz,
				round(avg(ifnull(cirg_puntaje_prom,0)),2) as cirg_puntaje_prom
				FROM cir_groups_oper co join cir_groups cg on co.cirg_code = cg.cirg_code join circuitos c on c.cir_code = co.cir_code join sec_users
				on co.use_code_operador = sec_users.use_code
				where cir_status='ACTIVO' and use_code_supervisor=".$sess->user_id." group by co.use_code_operador,use_name,use_code_supervisor,cir_name, cir_date_ini, cir_date_fin";
			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{		
			   $i++;
			   if ($this->categorias != "[") $this->categorias.=",";
		       $this->categorias.="'".$row["use_name"]."'";
			   
			   $pendientes[]= intval($row["cirg_cant_mon_pendientes"]);	
			   $realizadas[]= intval($row["cirg_cant_mon_realizados"]);	
			   $cerradas[]= intval($row["cirg_cant_mon_cierre_forz"]);	
			}
			$this->categorias.="]";			
			$this->series = "[";
			$this->series.= "{name: 'Realizadas',data: [";
			for ($i=0;$i<sizeof($realizadas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $realizadas[$i];
			}
			$this->series.= "]},";
			$this->series.= "{name: 'Cerradas',data: [";
			for ($i=0;$i<sizeof($cerradas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $cerradas[$i];
			}
			$this->series.= "]},";		
			$this->series.= "{name: 'Pendientes',data: [";
			for ($i=0;$i<sizeof($pendientes);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $pendientes[$i];
			}
			$this->series.= "]}";			
			$this->series.="]";

		}
		private function monitoreos_tabla_adm ()
		{
    		global $primary_db,$sess;
			$this->categorias = "[";
			$pendientes= array();			  
			$realizadas= array();
			$cerradas= array();
			$sql = "Select co.cir_code, co.cirg_code,cg.oper_grupo as oper_grupo,use_code_supervisor,use_name,cir_name, cir_date_ini, cir_date_fin,
			    sum(cirg_cant_mon_pendientes) as cirg_cant_mon_pendientes, sum(cirg_cant_mon_realizados) as cirg_cant_mon_realizados, 
				sum(cirg_cant_mon_ok) as cirg_cant_mon_ok, 
				sum(cirg_cant_mon_mal) as cirg_cant_mon_mal, sum(cirg_cant_cap_pendientes) as cirg_cant_cap_pendientes, 
				sum(cirg_cant_cap_realizados) as cirg_cant_cap_realizados, sum(cirg_cant_cap_ok) as cirg_cant_cap_ok,
				sum(cirg_cant_cap_mal) as cirg_cant_cap_mal, sum(cirg_cant_mon_cierre_forz) as cirg_cant_mon_cierre_forz,
				round(avg(ifnull(cirg_puntaje_prom,0)),2) as cirg_puntaje_prom
				FROM cir_groups_oper co join cir_groups cg on co.cirg_code = cg.cirg_code join circuitos c on c.cir_code = co.cir_code join sec_users
				on cg.use_code_supervisor = sec_users.use_code
				where cir_status='ACTIVO' group by co.cir_code, co.cirg_code,use_code_supervisor,use_name,cir_name, cir_date_ini, cir_date_fin";
			$re = $primary_db->do_execute($sql);
			$i=0;
			while($row = $primary_db->_fetch_row($re))
			{		
			   $i++;
			   if ($this->categorias != "[") $this->categorias.=",";
		       $this->categorias.="'".$row["use_name"]." - ".$row["oper_grupo"]."'";
			   
			   $pendientes[]= intval($row["cirg_cant_mon_pendientes"]);	
			   $realizadas[]= intval($row["cirg_cant_mon_realizados"]);	
			   $cerradas[]= intval($row["cirg_cant_mon_cierre_forz"]);	
			}
			$this->categorias.="]";			
			$this->series = "[";
			$this->series.= "{name: 'Realizadas',data: [";
			for ($i=0;$i<sizeof($realizadas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $realizadas[$i];
			}
			$this->series.= "]},";
			$this->series.= "{name: 'Cerradas',data: [";
			for ($i=0;$i<sizeof($cerradas);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $cerradas[$i];
			}
			$this->series.= "]},";		
			$this->series.= "{name: 'Pendientes',data: [";
			for ($i=0;$i<sizeof($pendientes);$i++)  
			{
			    if ($i>0) $this->series.= ",";
				$this->series.= $pendientes[$i];
			}
			$this->series.= "]}";			
			$this->series.="]";

		}
				
		private function monitoreos_grafico ()
		{
		$html = "
		<script type=\"text/javascript\">
		$(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Estado de Monitoreos - Circuito Actual'
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
		<div id='container' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
		
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
