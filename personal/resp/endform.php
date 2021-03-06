<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio</title>
    <link rel="stylesheet" type="text/css" href="../../librerias/bulma/css/bulma.min.css">
  </head>
  <body>
      <!-- NAVEGACIÓN -->
      <nav class="navbar is-link " role="navigation" aria-label="main navigation">
        <div class="container">
                <div class="navbar-brand">
                <img src= "../../images/logoColegio.png"  alt="Image" style="width:50px;height:50px;">
                  <a class="navbar-item" >
                      Colegio Antares Tulancingo
                  </a> 
                </div>
                <div class="navbar-end">
                 <a href="../resp/form.php" class="navbar-item">
                      Regresar
                    </a>
   <!--
                    <a href="./docker.html" class="navbar-item">
                      Docker
                    </a>-->
                </div>
        </div>
    </nav><!-- NAVEGACIÓN -->
  <!-- HERO -->
      <?php 
       $matricula = $_GET['mat'];
       $name = $_GET['name'];
       $fecha = $_GET['date'];
       $imagen = "../QRCode/images/".$matricula.".jpg"
      ?> 
  <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
           
            <div class="column is-third-desktop is-flex is-flex-direction-column is-justify-content-space-between is-three-quarters-mobile">
                <div>
                    <h3 class="is-size-2 has-text-black-bis has-text-weight-bold line-height-3 ">
                    <center><?php  echo "Nombre: ".$name ?> </center>
                    </h3>
                    <h3 class="is-size-2 has-text-black-bis has-text-weight-bold line-height-3 ">
                    <center> <?php  echo "Fecha: ".$fecha ?></center>
                    </h3>
                </div>
                <div>
                    <center>
                    <img src= <?php  echo $imagen ?>  alt="Image" style="width:300px;height:300px;">
                    </center>
                </div>
                <BR>
                <div>
                  <center>
                  <a class="button is-success is-rounded has-text-black" href="<?php echo "../QRCode/descarga.php?mat=$matricula" ?>">
                  Descargar
                  <img src= "../../images/R.png"  alt="Image" style="width:40px;height:20px;">
                </a>
                  </center>
                </div>
                <BR>
                <div>
                    <h3 class="is-size-4 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                    <center> Has terminado tu proceso, ya puedes cerrar la pestaña.</center>
                    </h3>
                </div>
            </div>
           
        </section>
    </div>
</div><!-- HERO -->
</body>
</html>