<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  	<head>
    	<title>Magic Blue - Reservas</title>
    
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>


	<body>

		<?php 
			$dias_labels = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
			$meses_labels = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

			$mes_actual = date("n");
			$anyo_actual = date("Y");
			
			$dias_mes_actual = date("t");
			$semanas_mes_actual = ($dias_mes_actual % 7 == 0 ? 0 : 1) + intval($dias_mes_actual / 7);

			echo $dias_mes_actual." ".$semanas_mes_actual." ".date("N");
		?>

		<div class="container-fluid">
  			<div class="row">
			    <div class="col-md-12">
			    	Columna principal
			    </div>
  			</div>
		</div>

	</body>

</html>