
function valPHONE(fldID,fldLabel) 
{
	fld = document.getElementById(fldID);
	if(fld) 
	{
		valor = fld.value;
		if(valor=="")
		{
			return "";
		}
		re = new RegExp("^[0-9]{2,4}[-]{0,1}[0-9]{2,4}[-]{0,1}[0-9]{0,4}[-]{0,1}[0-9]{0,4}$");
		if( re.test(valor)==true )
		{
			return "";
		}
		else
		{
			return "El campo " + fldLabel + " debe contener un telefono en formato numerico. Minimo 8 digitos";
		}
	} 
	else 
	{
		return "campo " + fldID + " no se encuentra";
	}
}
