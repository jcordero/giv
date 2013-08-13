function downloadOnLoad()
{	
	 // ocultar tablas y botones del formulario
	 $("#bloque_grupo2").hide();
	 $("#tabla_oper_status").hide();
	 $("#enviar_todo").hide();
	 boton = "<div id=\"idBuscar\" class=\"submitbutton\">" +
	 "<button type=\"button\" class=\"maint submit\" id=\"idBuscarBuscar\" onclick=\"buscar()\">Buscar</button></div>";
	 $("#bloque_grupo1").append(boton);
}
	
function sacarBotonBuscar() 
{
	$("#idBuscar").hide();
	$("#bloque_grupo1").hide();
	$("#bloque_grupo2").show();
	$("#tabla_oper_status").show();
	$("#enviar_todo").show();
}
function reingresar() 
{
	$('#m_oper_grupo').attr('readonly', false);
}
function buscar() 
{
	var oper_grupo = $.trim($("#m_oper_grupo").val());
	
	if (oper_grupo.length==0) 
	{
		return true;
	}
	// $('#m_oper_grupo').attr('readonly', true);
	// $('#m_oper_grupo .fldm').val(oper_grupo);
	$("#bloque_grupo2 .titulo_texto").append(" - " +oper_grupo);
	
	var param_v = oper_grupo;
	updateForm(param_v,"buscar_grupos","buscar");
}
	

