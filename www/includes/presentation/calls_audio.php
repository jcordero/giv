<?php
include_once "common/cdatatypes.php";
include_once "common/cfile.php";
include_once "common/cthumb.php";

//Eventos javascript en el tablemaint.js 
/** 	Para subir archivos */
class CDH_CALLS_AUDIO extends CDataHandler 
{
	//Este tipo de dato no deberia aparecer sobre un form comun.
    //Solo sobre el file-upload
    function RenderFilterForm($cn,$name="",$id="")
	{
		$fld = $this->m_parent;
		$val = $fld->getValue();

		if($name=="")
        {
            $name=$this->getName();
        }
		
        if($id=="")
        {
            $id=$name;
        }
		
        if(!$fld->m_IsVisible) 
		{ //Si esta oculto
			$html="<INPUT TYPE=\"HIDDEN\" NAME=\"$name\" id=\"$id\" VALUE=\"$val\"/>"."\n";
		} 
		else 
		{
		

			$fi = new _CFile();
			$carpeta = $fi->get_path($val);
			$file = $carpeta.$val;
			if(!file_exists($file))
			{
			   error_log(__FILE__."No existe archivo  {$carpeta}{$val}");
			
			}
			$c = substr($carpeta,-26);
			$file = WEB_PATH.$c.$val;			
			error_log("calls_audio::RenderFilterForm ".$file);
			$html ="<div id=\"$fld->m_Name\" class=\"itm\"><div class=\"desc\">$fld->m_Label</div><div class=\"fld\">";
			$html.="<input type=\"FILE\" name=\"$name\" id=\"$id\" value=\"$val\" maxlength=\"200\" SIZE=\"60\"/>";

			$html.="<audio controls>";
			$html.="<source src=\"$file\" type=\"audio/wav\">";
			$html.="Your browser does not support the audio element.";
			$html.="</audio>";
			$html.="</div></div>"."\n";
		}
		return $html;
	}
	
	function RenderTableEdit($cn,$frmname,$table="",$row=0,$ro=false,$name="") 
	{
		$fld = $this->m_parent;
		$val = $fld->getValue();
		
		if($name=="")
        {
            $name = $this->getName($table,$row);
        }
		
        if($frmname=="")
		{
            $id = $name;
        }
		else
		{
            $id = $frmname."_".$name;
        }
		
		if($ro) 
		{
		
			$fi = new _CFile();
			$carpeta = $fi->get_path($val);
			$file = $carpeta.$val;
			if(!file_exists($file))
			{
			   error_log(__FILE__."No existe archivo  {$carpeta}{$val}");
			
			}	
			error_log("calls_audio::RenderTableEdit ".$file);	
			$c = substr($carpeta,-26);
			$file = WEB_PATH.$c.$val;			
			$html ="<input type=\"hidden\" name=\"$name\" id=\"$id\" value=\"$val\"/>";

			$html.="<audio controls>";
			$html.="<source src=\"$file\" type=\"audio/wav\">";
			$html.="Your browser does not support the audio element.";
			$html.="</audio>";

		}
		else
		{
            $html=$this->RenderFilterForm($cn,$name,$id);
        }
		
		return $html;
	}


    /**
	 * Muestra solo el valor, o bien un campo con descripcion y valor
	 * Si el campo es no visible => Retorna un blanco
	 * Si tiene un helperValue() declarado => Retorna ese resultado
	 * Si es de tipo PASSWORD => Retorna ****
	 * Si el parametro "showlabel" es true => Retorna un <div .. con el LABEL / VALOR
	 *
	 * @param cdbdata $cn
	 * @param boolean $showlabel
	 * @return string
	 */
	function RenderReadOnly($cn,$showlabel=false)
	{
		$fld = $this->m_parent;
		$html="";
		$val = $fld->getValue();
		$name = $fld->m_Name;
		$id = $name;


		$fi = new _CFile();
		$carpeta = $fi->get_path($val);
		$file = $carpeta.$val;
		if(!file_exists($file))
		{
			   error_log(__FILE__."No existe archivo  {$carpeta}{$val}");
			
		}

		$c = substr($carpeta,-26);
		$file = WEB_PATH.$c.$val;
		
		if($fld->m_IsVisible)
		{
			if($showlabel)
			{
                $html ="<input type=\"hidden\" name=\"$name\" id=\"$id\" value=\"$val\"/>";      
			
				$html.="<audio controls>";
				$html.="<source src=\"$file\" type=\"audio/wav\">";
				$html.="Your browser does not support the audio element.";
				$html.="</audio>";

				if($fld->m_Label=="")
				{
					error_log("RenderReadOnly($name) no tiene etiqueta declarada");
				}
			}
			else
			{
				$html=$img;
			}
		}
		else
		{
			$id = $name;
			$html="<input type=\"HIDDEN\" name=\"$name\" id=\"$id\" value=\"$val\"/>"."\n";
		}
		$fld = null;
		error_log(__FILE__." $html");
		return $html;
	}
	
	function RenderPDF($cn,$showlabel=false)
	{
		$fld = $this->m_parent;
		return $fld->getValue();
	}
	
}
?>