function downloadOnLoad()
{	
	var cir_code = $("#m_cir_code").val();
	$("#bloque_unico").html("<img src='/images/default/loading2.gif'>");
	$("#actionCancel").html("Volver");
	$("#actionSubmit").hide();	
	//Llamo al presentation INF_AGOTADOS
	var web_path = "";
	var url = web_path + "/common/rem_request.php?presentation=CIR_GRAFICO&func=graficar&args="+cir_code;
	$.getJSON(url, function(data) {	
        h = data.html;	
		$("#bloque_unico").html(h);

	});
}
	

