<form class="navbar-form navbar-right" action="./" method="post" id="login-form">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Login" name="login" id="login">
		<input type="password" class="form-control" placeholder="Password" name="password" id="password">
	</div>
	<button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
		<span class="glyphicon glyphicon-log-in"></span>  Login
	</button>
</form>

<script>
	$("#btn-login").click(function() {
		login = $("#login").val();
		pass = $("#password").val();

		$.ajax({
			type: "POST",
			url: "includes/login.php",
			data: "login="+login+"&password="+pass,
			success: function(html) {
				if (html=='true') {
					//alert("Login correcto!");
					$("#user-area").load("includes/user-logged.php");
				} else {
					alert("NO SE HA LOGADO =>" + html);
				}
			}
		});

		return false;
	});
</script>