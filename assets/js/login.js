$("#form_login").submit(function(e) {
	var usuario = $("#usuario").val();
	var password = $("#password").val();
	var tipo_usuario = $("#tipo_usuario").val();
	$.ajax({
		url: base_url+'login/login_check',
		type: 'POST',
		dataType: 'json',
		data: {usuario: usuario,password:password,tipo_usuario:tipo_usuario},
	})
	.done(function(data) {
		if (data.status) {
			window.location.href = base_url+"home";
		}else{
			alert("Error al iniciar");
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

	e.preventDefault();
});