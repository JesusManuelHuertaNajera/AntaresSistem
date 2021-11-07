<!DOCTYPE html>
<html>
  <head>
    <title>Colegio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="../librerias/bulma/css/bulma.min.css">
    <style type="text/css">
      body{
      padding: 0;
      margin: 0;
      }
      .hero{
      height: 100vh;
      position: relative;
      }
      .notification{
      padding-top: 20px;
      padding-bottom: 30px;
      }
      .button{
      margin-top: 10px;
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
    <Form action="" method="get">
        <div class="hero is-info">
      <div class="hero-body">
      <?php
            if(isset($_GET['error'])){
                $error= "Error en la contraseña o matrícula";
            }else{
                $error="";
            }
         ?>
        <h1 class="title has-text-centered is-size-2">PERSONAL</h1>
        <h1 class="title has-text-centered is-size-4"><?php echo $error; ?></h1>
        <div class="columns is-centered">
          <div class="column is-half">
            <div class="notification is-light">
              <div class="field">
                <label class="label">Correo</label>
                <p class="control has-icons-left has-icons-right">
                  <input class="input" type="email" id="mail" name="mail" placeholder="Email" required>
                  <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <label class="label">Contraseña:</label>
                <p class="control has-icons-left">
                  <input class="input" type="password" id="pass" name="pass" placeholder="Password" required>
                  <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
               <button class="button is-link" name="log" >Iniciar sesión</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </Form>
    <?php 
        $mysql = require_once "../conexion.php";
                if(isset($_GET['log'])){
                    $email= $_GET['mail'];
                    $pass= $_GET['pass'];
                    $revisar ="SELECT * FROM PERSONAL WHERE CORREO = "."'".$email."'" ." AND CONTRASENIA ="."'".$pass."'";
                    $resp = $mysql->query($revisar);
                    $texto = "Error";
                    $i = 0;
                    foreach($resp as $up){
                        $i=$i+1;
                    }
                    if($i > 0){
                        header("location: ./menup.php");
                    }
                    else{
                        header("location: ./login.php?error=$texto");
                    }
                }
        ?>
 
  </body>
</html>
