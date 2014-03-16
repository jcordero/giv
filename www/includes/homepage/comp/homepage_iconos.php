<?php
if(!class_exists('homepage_iconos'))
{
	include_once "common/cfield.php";
	include_once "common/menufunctions.php";
	include_once "presentation/inf_precios.php";
	include_once "presentation/inf_agotados.php";
	class homepage_iconos
	{
		public function Render($context)
		{
			$html="";
			$html .= $this->getIconos();
			$content["homepage_iconos"] = $html;
			return array( $content, array() );
		}

		private function getIconos()
		{
			global $primary_db,$sess;
			error_log(__FILE__."INGRESO");
			$html = '';
			$grupos= explode(',',$sess->groups);
			global $primary_db,$sess;
			error_log(__FILE__."INGRESO");
			$html = '';
			$grupos= explode(',',$sess->groups);
						
			$html = '<div style="height:800px;"><div style="background:#fff;border:0px;margin-left:10px;margin-right:30px;padding:5px;text-align:left;">';
			$html.= "<table width=660>";	
			
			$html.= "<tr><td><table class='grafico' width=450 bgcolor=#FFFFFF>";	
			// Sacar de presentation/inf_agotados.php
			$inf_agotados = new CDH_INF_AGOTADOS($p);
			$html.= "<tr height=20><td colspan=3>EXISTENCIA ACTUAL:<td></tr>";
			$html.= "<tr height=100><td width=150>".$inf_agotados->gstock(4)."</td>";		
			$html.= "<td width=150>".$inf_agotados->gstock(1)."</td>";		
			$html.= "<td width=150>".$inf_agotados->gstock(2)."</td></tr>";		
			$html.= "<tr height=20 align=center><td>FARMACIA</td>";		
			$html.= "<td>COSMETICOS</td>";		
			$html.= "<td>SNACKS</td></tr>";		
			$html.= "</table></td></tr>";				
			// Sacar de presentation/inf_precios.php

			$inf_precios = new CDH_INF_PRECIOS($p);
      	    $chs = "250x150";
			$hasta = date("d/m/Y");
			$desde = date("d/m/Y",strtotime("-4 week"));
			error_log($hasta." ".$desde);
		    $s1 = $inf_precios->armar_s1 ($desde,$hasta);
		    $img1 = $inf_precios->armar_image($s1,'Propios',$chs);		
		    $s2 = str_replace("pro_price", "pro_price_pub", $s1);
		    $img2 = $inf_precios->armar_image($s2,'Publicados',$chs);			
		    $s3 = str_replace("rep_exhib_prod", "rep_exhib_prod_comp", $s2);
		    $img3 = $inf_precios->armar_image($s2,'Competencia',$chs);				
			$html.= "<tr><td><table class='grafico' width=660 bgcolor=#FFFFFF>";	
			$html.= "<tr><td height=20 colspan=3>PRECIOS POR SEMANA:</td></tr>";		
			$html.= "<tr height=150><td width=220>".$img1."</td>";		
			$html.= "<td width=220>".$img2."</td>";		
			$html.= "<td width=220>".$img3."</td></tr>";		
			$html.= "</table></td></tr>";

			
			$html.= "<tr><td><table class='grafico' width=660 bgcolor=#FFFFFF valing=top>";	
			$html.= "<tr><td height=10>PROMOTOR:</td><td height=10>SUPERVISOR:</td></tr>";		
			$html.= "<tr><td>".$this->rankPromotor($desde,$hasta,"use_code_prom","desc","#A9F5A9",300,5,'')."</td>";		
			$html.= "    <td>".$this->rankPromotor($desde,$hasta,"use_code_super","desc","#A9F5A9",300,5,'')."</td></tr>";		
			$html.= "<tr><td>".$this->rankPromotor($desde,$hasta,"use_code_prom","asc","#F5A9A9",300,5,'')."</td>";		
			$html.= "    <td>".$this->rankPromotor($desde,$hasta,"use_code_super","asc","#F5A9A9",300,5,'')."</td></tr>";		
			$html.= "</table></td></tr>";

			
			$html.= "</table>";
			
			$html.= "</div></div>\n";
			
		    return $html;	
		}
		function rankPromotor($desde,$hasta,$usuario,$order,$color,$ancho,$cant=5,$titulo)
	    {   
	      global $primary_db;
		  $html ='<table width="'.$ancho.'">';
		  if ($titulo!='')
		  {
		    $html.='<tr><td colspan=3 width=$ancho bgcolor=$color>'.$titulo.'</td></tr>';
		  }	
		  $sql = "select top $cant use_name,round(avg(convert(float,rep_calificacion)),2) as calificacion, COUNT(*) as cantidad from reportes ";
		  $sql.= "join sec_users on  sec_users.use_code=".$usuario." ";
		  $sql.= "where(rep_tstamp_super between convert(datetime,'$desde',103) and convert(datetime,'$hasta',103) or ('$desde'='' and '$hasta'='')) ";
		  $sql.= "group by use_name order by round(avg(convert(float,rep_calificacion)),2) $order,COUNT(*) $order";
		  $re = $primary_db->do_execute($sql);
		  $i=0;
		  while($row = $primary_db->_fetch_row($re))
		  { $i=$i+1;
			$html.="<tr width=$ancho bgcolor=$color><td>".$row['use_name']."</td><td width=30>".$row['cantidad']."</td><td width=30>".round($row['calificacion'],2)."</td></tr>";
		  }
		  while($i<5)
		  { $i=$i+1;
			$html.="<tr width=$ancho bgcolor=$color><td>-</td><td>-</td><td>-</td></tr>";
		  }
		  $html.='</table>';
		  return $html;	
	    }
	}

}		
?>