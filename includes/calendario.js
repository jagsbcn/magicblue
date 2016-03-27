$(".dia").click(function() {
	alert($(this).data("dia") + '/' + $(this).data("mes") + '/' + $(this).data("anyo"));
});

$("#btn_mes_ant").click(function() {
	alert("vamos a mes anterior");
});

$("#btn_mes_sig").click(function() {
	alert("vamos a mes siguiente");
});

$(function() {
	/*$("#dv-horas").css("height", $("#tb-calend").height());
	$("#dv-horas").css("width", $(window).width() - $("#tb-calend").width() + 5);*/
	$("#dv-horas").height($("#tb-calend").height());
	$("#dv-horas").width($(window).width() - $("#tb-calend").width() - 20);
});