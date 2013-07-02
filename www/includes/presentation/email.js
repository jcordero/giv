
function valEMAIL(fldID,fldLabel) 
{
	fld = document.getElementById(fldID);
	if(fld) 
	{
		valor = fld.value;
		if(valor=="")
		{
			return "";
		}
		expr = "^([\\w]{1,})(.[\\w]{1,}){0,}@([\\w]+)(.[\\w]{2,3}){1,2}$"; //	
		//alert("valido email '" + valor+"' expr: '" +expr + "'");
		//	\w matches any alphanumerical character (word characters) including underscore (short for [a-zA-Z0-9_]).
		// 	+ es lo mismo que {1,}
		//	. matches any character except a newline.
		//	^ matches beginning of input (or new line with m flag).
		//	* is short for {0,}. Matches zero or more times.
		//	$ matches end of input (or end of line with m flag).
		// En castellano "que empiece con cualquier nro o letra, luego de 1 o mas letras, puede venir punto y mas nros o letras. Luego debe venir un @ y 
		//luego un nro o letras. Tiene que haber 2 o 3 bloques de texto terminado en un punto
		re = new RegExp(expr);
		if( re.test(valor)==true )
		{
			return "";
		}
		else
		{
			return "El campo " + fldLabel + " debe contener una direccion de correo valida";
		}
	} 
	else 
	{
		return "campo " + fldID + " no se encuentra";
	}
}
