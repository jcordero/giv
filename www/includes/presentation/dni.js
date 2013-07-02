//DNI
function valDNI(fld,fldLabel) 
{
	if ($('#m_'+fld).length){
	    var p = $('#m_'+fld);
	};
	
	if ($('#'+fld).length){
	    var p = $('#'+fld);
	}

	var valor = p.val();
	valor = parseInt(valor,10);
	if (isNumber(valor))  {
	   p.val(valor);
	}
	
	return validar(valor); 
}
function isNumber(n) {
               return !isNaN(parseInt(n)) && isFinite(n);
}
function validar(valor) 
{
		if(valor=="")
		{
			return "";
		}		

		if (isNumber(valor) && (valor.toString().length>5) && (valor.toString().length<11))
		{
			return "";
		} 
		else
		{
			return "El campo documento debe contener de 6 a 10 digitos sin espacios";
		}
}
