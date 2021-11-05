<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio</title>
    <link rel="stylesheet" type="text/css" href="./librerias/bulma/css/bulma.min.css">
  </head>
  <body>
      <!-- NAVEGACIÓN -->
      <nav class="navbar is-link " role="navigation" aria-label="main navigation">
        <div class="container">
                <div class="navbar-brand">
                <img src= "./images/logoColegio.png"  alt="Image" style="width:50px;height:50px;">
                  <a class="navbar-item" >
                      Colegio Antares Tulancingo
                  </a> 
                </div>
                <div class="navbar-end">
                    <a href="./form.php" class="navbar-item">
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
       $mensaje = $_GET['text'];
      
      ?> 
  <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
           
            <div class="column is-third-desktop is-flex is-flex-direction-column is-justify-content-space-between is-three-quarters-mobile">
                <div>
                    <h1 class="is-size-1 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                    <center> <?php echo $mensaje ?> </center>
                    </h1>
                </div>

                <BR>
                <div>
                    <h3 class="is-size-4 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                    <center> Disculpa el inconveniente.  </center>
                    </h3>
                </div>
                <BR>
                <div>
                    <center>
                    <img src= "./images/warning.png"  alt="Image" style="width:300px;height:300px;">
                    </center>
                </div>
            </div>
           
        </section>
    </div>
</div><!-- HERO -->
</body>
</html>
