<?php
session_start();
$permisos= $_SESSION['p']; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio</title>
    <link rel="stylesheet" type="text/css" href="../librerias/bulma/css/bulma.min.css">

    <style type="text/css">
         .textos{
            padding-left: 40px;
        }
    </style>
  </head>
  <body>
      <!-- NAVEGACIÓN -->
      <nav class="navbar is-link " role="navigation" aria-label="main navigation">
        <div class="container">
                <div class="navbar-brand">
                <img src= "../images/logoColegio.png"  alt="Image" style="width:50px;height:50px;">
                  <a class="navbar-item" >
                      Colegio Antares Tulancingo
                  </a> 
                </div>
                <div class="navbar-end">
                    <a href="../index.php" class="navbar-item">
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
        
    <div class="has-background-grey-lighter">    
       <br>
        <br>
        <?php 
        if($permisos == 1){ ?>
        <div class="columns">
            <div class="column">
                
            </div>
            <div class="column box">
                <CENTER>
                <h1 class="title is-4">Formulario COVID-19</h1>
                </CENTER>
                <center>
                    <img src= "../images/formulario.png"  alt="Image" style="width:100px;height:100px;">
                </center>
                <CENTER>
                    <a class="button  is-fullwidth is-rounded is-info" href="./resp/form.php"> Entrar</a>
                </CENTER>
            </div>
            <div class="column ">
            </div>
        </div>
        <?php } ?>
        <?php 
        if($permisos == 2){ ?>
       <div class="columns">
            <div class="column">
                
            </div>
            <div class="column box">
                <CENTER>
                <h1 class="title is-4">Formulario COVID-19</h1>
                </CENTER>
                <center>
                    <img src= "../images/formulario.png"  alt="Image" style="width:100px;height:100px;">
                </center>
                <CENTER>
                    <a class="button  is-fullwidth is-rounded is-info" href="./resp/form.php"> Entrar</a>
                </CENTER>
            </div>
            <div class="column ">
            </div>
            <div class="column box">
                <CENTER>
                <h1 class="title is-4">Reporte Estudiantes</h1>
                </CENTER>
                <center>
                    <img src= "../images/reports.png"  alt="Image" style="width:100px;height:100px;">
                </center>
                <CENTER>
                    <a class="button  is-fullwidth is-rounded is-info" href=<?php echo "./report/est.php"; ?>> Entrar</a>
                </CENTER>
            </div>
            <div class="column">
            </div>  
        </div>
        <?php } ?>
        <?php 
        if($permisos == 3){ ?>
        <div class="columns">
            <div class="column">
                
            </div>
            <div class="column box">
                <CENTER>
                <h1 class="title is-4">Formulario COVID-19</h1>
                </CENTER>
                <center>
                    <img src= "../images/formulario.png"  alt="Image" style="width:100px;height:100px;">
                </center>
                <CENTER>
                    <a class="button  is-fullwidth is-rounded is-info" href=<?php echo "./resp/form.php"; ?>> Entrar</a>
                </CENTER>
            </div>
            <div class="column ">
            </div>
            <div class="column box">
                <CENTER>
                <h1 class="title is-4">Reporte Estudiantes</h1>
                </CENTER>
                <center>
                    <img src= "../images/reports.png"  alt="Image" style="width:100px;height:100px;">
                </center>
                <CENTER>
                    <a class="button  is-fullwidth is-rounded is-info" href=<?php echo "./report/est.php"; ?>> Entrar</a>
                </CENTER>
            </div>
            <div class="column ">
            </div>
            <div class="column box">
                <CENTER>
                <h1 class="title is-4">Reporte Personal</h1>
                </CENTER>
                <center>
                    <img src= "../images/reportsp.png"  alt="Image" style="width:100px;height:100px;">
                </center>
                <CENTER>
                    <a class="button  is-fullwidth is-rounded is-info" href=<?php echo "./perport/per.php" ?>> Entrar</a>
                </CENTER>
            </div>
            <div class="column">
            </div>  
        </div>
    <?php } ?>
</div><!-- HERO -->
</body>
</html>
