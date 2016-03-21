<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Magic Blue</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="includes/mb.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  
  <body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- Creamos la barra de menu -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">MagicBlue</a>
        </div>
        
        <ul class="nav navbar-nav">
          <li class="active"><a href="#seccion1">Sección 1</a></li>
          <li><a href="#seccion2">Sección 2</a></li>
          <li><a href="#seccion3">Sección 3</a></li>
          <li><a href="reservas.php">Reservas</a></li>
        </ul>

        <div id="user-area">
          <?php
            if (isset($_SESSION['user_login'])) {
              include "includes/user-logged.php";
            } else {
              include "includes/user-not-logged.php";   
            }
          ?>
        </div>

      </div>
    </nav>

    <!-- Secciones de la pagina -->
    <div id="seccion1" class="container-fluid seccion">
      <h1>Seccion 1</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>

    <div id="seccion2" class="container-fluid seccion">
      <h1>Seccion 2</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>

    <div id="seccion3" class="container-fluid seccion">
      <h1>Seccion 3</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>

  </body>

</html>
