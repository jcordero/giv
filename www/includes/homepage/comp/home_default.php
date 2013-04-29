<?php 
/* Pantalla inicial para el operador de denu cgpc
 */
if(!class_exists('home_default'))
{
    include_once "common/cfield.php";

	class home_default
	{
		public function Render($context)
		{
			global $sess,$primary_db;
			$url_proveedor = $sess->encodeURL( WEB_PATH.'/lmodules/proveedores1/proveedores.php?OP=L' );
			$url_cliente= $sess->encodeURL( WEB_PATH.'/lmodules/clientes/clientes.php?OP=L' );
			$url_reporte = $sess->encodeURL( WEB_PATH.'/lmodules/clientes/reporte.php?OP=L' );			
			$url_pagos = $sess->encodeURL( WEB_PATH.'/lmodules/pagos1/pagos.php?OP=L' );
			$url_transferencias = $sess->encodeURL( WEB_PATH.'/lmodules/pagos1/pagos_transferencias.php?OP=L' );
			$url_cheques = $sess->encodeURL( WEB_PATH.'/lmodules/pagos1/pagos_cheques.php?OP=L' );
			$url_tarjetas = $sess->encodeURL(WEB_PATH.'/lmodules/tarjetas/prov_tarjetas.php?OP=L');
			$url_comisiones = $sess->encodeURL(WEB_PATH.'/lmodules/comisiones/cli_comisiones.php?OP=L');
			$url_emision = $sess->encodeURL(WEB_PATH.'/lmodules/cheques/pag_procesos.php?OP=L');
			$url_documentacion = $sess->encodeURL(WEB_PATH.'/lmodules/pagos1/pagos_reten_prv.php?OP=L');
			/*
			$html = '
		<div id="iconos_home">	
					<ul id="navlist">
					  <li id="icon1"><a href="'.$url_cliente.'"></a></li>
					  <li id="icon2"><a href="'.$url_proveedor.'"></a></li>
					  <li id="icon3"><a href="'.$url_pagos.'"></a></li>
					  <li id="icon4"><a href="clientes.php"></a></li>
					  <li id="icon5"><a href="'.$url_transferencias.'"></a></li>
					  <li id="icon6"><a href="clientes.php"></a></li>
					  <li id="icon7"><a href="clientes.php"></a></li>
					  <li id="icon8"><a href="clientes.php"></a></li>
					  <li id="icon9"><a href="'.$url_cheques.'"></a></li>
					  <li id="icon10"><a href="clientes.php"></a></li>
					  <li id="icon11"><a href="'.$url_tarjetas.'"></a></li>				  
					</ul>

		</div>
			
			';
			*/
			$iconos = '';
			$titulo = '';
			$f = '<FONT COLOR="#58585A" FACE="Arial" SIZE="2">';
			if ($sess->haveRight($primary_db,'menu.archivo.clientes.consulta'))
			{
				$iconos.= "<td><a href='".$url_cliente."'><img src='/images/icons/ico_clientes.png'></a></td>";
				$titulo.="<td>".$f."Clientes</font></td>";
			}
			
			if ($sess->haveRight($primary_db,'menu.archivo.comisiones.generadas'))
			{
				$iconos.= "<td><a href='".$url_comisiones."'><img src='/images/icons/ico_comisiones.png'></a></td>";
				$titulo.="<td>".$f."Comisiones</font></td>";
			}
			
			if ($sess->haveRight($primary_db,'menu.archivo.proveedores'))
			{
				$iconos.= "<td><a href='".$url_proveedor."'><img src='/images/icons/ico_consultas.png'></a></td>";
				$titulo.="<td>".$f."Proveedores</font></td>";
			}
			
			if ($sess->haveRight($primary_db,'menu.archivo.certificados.impresion'))
			{
				$iconos.= "<td><a href='".$url_documentacion."'><img src='/images/icons/ico_entrega_documentos.png'></a></td>";
				$titulo.="<td>".$f."Entrega de <br>Documentación</font></td>";
			}
			
			if ($sess->haveRight($primary_db,'menu.cheques.proceso'))
			{
				$iconos.= "<td><a href='".$url_emision."'><img src='/images/icons/ico_emision_cheques.png'></a></td>"; 
				$titulo.="<td>".$f."Emision de <br>Cheques</font></td>";
			}
			
			if ($sess->haveRight($primary_db,'menu.archivo.transferencias'))
			{
				$iconos.= "<td><a href='".$url_transferencias."'><img src='/images/icons/ico_transferencias.png'></a></td>"; 
				$titulo.="<td>".$f."Transferencias</font></td>";
			}
				
			
			$html = '
			    <table width=100% align=center height=100% cellspacing="0px" >
				<tr><td>
		           <table width=100% height=140px bgcolor="#ffffff" style="padding-top: 15px;">
				   <tr><td align="center">
				    <table  width=90% height="100%">
					<tr align="center" height="100%">'.$iconos.'</tr>
					<tr valign="top" align="center">'.$titulo.'</tr>
					</table>
					</td></tr>
					</table>';
			
			$content["home_default"] = $html;
			return array( $content, array() );
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
