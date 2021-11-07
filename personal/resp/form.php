<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
                    <a href="../../personal/menup.php" class="navbar-item">
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
            
  <!--<div style="background-color:#5b8b47;">-->
    <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
        <div class="column is-two-desktop is-flex is-flex-direction-column is-justify-content-space-between is-three-quarters-mobile">
                <div>
                    <h3 class="is-size-3 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                    </h3>
                </div>
            <form action="../QRCode/main.php" method="post" class="box">

              <div class="column is-two-desktop is-flex is-flex-direction-column is-justify-content-space-between is-three-quarters-mobile">
                <div>
                    <h3 class="is-size-3 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                    <center> Formulario</center>
                     
                    </h3>
                </div>

                <div class="field">
                  <label class="label">1.- ¿Cual es tu Correo?</label>
                      <div class="control">
                        <input class="input" type="text" name="matricula" id="matricula" placeholder="ejemplo@colegioantares.com.mx..." onkeyup="this.value = this.value.toUpperCase();" required>
                      </div>
                </div>

                <div class="field">
                  <label class="label">2.- ¿Actualmente tienes uno de estos síntomas?</label>
                  <h4>Señale todos los que apliquen</h4>
                      <div class="control">
                      <br>
                       <input type="checkbox" id="v21" name="v21" > Fiebre igual o mayor a 38ºC
                       <br>
                       <input type="checkbox" id="v22" name="v22" > Dificultad al respirar
                       <br>
                       <input type="checkbox" id="v23" name="v23" > Escalofríos
                       <br>
                       <input type="checkbox" id="v24" name="v24" > Tos
                       <br>
                       <input type="checkbox" id="v25" name="v25" > Pérdida del sentido de gusto u olfato
                       <br>
                       <input type="checkbox" id="v26" name="v26" > Ninguna de las anteriores
                       <br>
                      </div>
                </div>

                <div class="field">
                  <label class="label">3.- ¿Actualmente tienes uno de estos síntomas?</label>
                  <h4>Señale todos los que apliquen</h4>
                      <div class="control">
                      <br>
                       <input type="checkbox" id="v31" name="v31" > Dolor de garganta
                       <br>
                       <input type="checkbox" id="v32" name="v32" > Fatiga
                       <br>
                       <input type="checkbox" id="v33" name="v33" > Dolor de cabeza
                       <br>
                       <input type="checkbox" id="v34" name="v34" > Dolor de cuerpo o muscular
                       <br>
                       <input type="checkbox" id="v35" name="v35" > Náuseas o vómito
                       <br>
                       <input type="checkbox" id="v36" name="v36" > Diarrea
                       <br>
                       <input type="checkbox" id="v37" name="v37" > Ninguna de las anteriores
                       <br>
                      </div>
                </div>

                <div class="field">
                    <label class="label">4.- ¿Has regresado de algún viaje internacional en los ultimos 14 dias?</label>
                    <div class="control">
                    <div class="select is-rounded">
                    <select name="intera" required>

                        <option value="">Elige una opción</option>
                        <option>SI</option>
                        <option>NO</option>
                    </select>
                        
                  </div>
                  
                  </div>
                  
                </div>

                <div class="field">
                  <label class="label">5.- ¿Eres un contacto cercano de alguna persona que padece COVID-19 confirmado?</label>
                  <h4>Se considera un contacto estrecho o de riesgo, a cualquier persona que haya compartido espacio con el caso
                    confirmado, a una distancia menor a 2 metros alrededor del caso, durante más de 15 minutos acumulados durante un
                    un periodo de 24 horas, salvo que se pueda ASEGURAR  que se ha hecho un uso adecuado del cubrebocas.</h4>
                  <br>
                  <div class="control">
                  <div class="select is-rounded">
                    <select name="contact" required>

                        <option value="">Elige una opción</option>
                        <option>SI</option>
                        <option>NO</option>
                        </select>
                        
                  </div>
                  </div>
                </div>

                <div class="field is-grouped">
                  <div class="control">
                    <button class="button is-link" >Guardar</button>
                  </div>
                </div>
              </form>
            </div>
            
        </section>
    </div>
</div><!-- HERO -->

</body>
</html>