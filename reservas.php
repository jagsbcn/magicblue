<?php
session_start();
include "includes/calendario.php";
$calendario = new Calendario();
?>

<!DOCTYPE html>
<html lang="en">
  	<head>
    	<title>Magic Blue - Reservas</title>
    
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="includes/calendario.css">

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>


	<body>

		<div class="container-fluid">
			<div class="row">
				<div id="dv-cal" class="col-md-8">
					<?php
						echo $calendario->mostrarCal();
					?>
				</div>
				<div id="dv-hor" class="col-md-4">
					<?php
						echo $calendario->mostrarHor();
					?>
				</div>
			</div>
		</div>
	</body>

	<script src="includes/calendario.js"></script>

</html>