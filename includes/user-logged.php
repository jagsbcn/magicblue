<?php
  session_start();
?>

<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
  		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> <?php echo $_SESSION['user_name']?> <span class="caret"></span></a>
  		<ul class="dropdown-menu">
    		<li><a href="#">Opción 1</a></li>
    		<li><a href="#">Opción 2</a></li>
    		<li><a href="#">Opcion 3</a></li>
    		<li class="divider"></li>
    		<li><a href="#" id="lnk-logout"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
  		</ul>
	</li>
</ul>

<script>
	$("#lnk-logout").click(function() {
		$.ajax({
			type: "POST",
			url: "includes/logout.php",
			success: function(html) {
				$("#user-area").load("includes/user-not-logged.php");
			}
		});

		return false;
	});
</script>