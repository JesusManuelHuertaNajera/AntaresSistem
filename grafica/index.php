<?php 
$mysql = require_once "../conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    <script src="../librerias/jquery-3.6.0.min.js"></script>
    <script src="../librerias/plotly-2.4.2.min.js"></script>
    <script src="../librerias/script.js"></script>
    <script src="../librerias/html2pdf.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="../librerias/bulma/css/bulma.min.css">
    <style type="text/css">
        .mover{
            margin-top: 20px;
            text-align-last: center;
        }
        .grafica{
            margin-left: 150px;
        }
        .space{
            padding-left: 60px;
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
                <button class="button is-link" onclick="generarPDF()">Generar reporte</button>
                   <!-- <a href="./index.php" class="navbar-item">
                      Regresar
                    </a>

                    <a href="./docker.html" class="navbar-item">
                      Docker
                    </a>-->
                </div>
        </div>
    </nav><!-- NAVEGACIÓN -->
    <br>
    <div class="columns space box">
        
        <div class="column ">
            <form action="" method="GET">
                <h2 class="title is-5">Coloca La Matrícula</h2>
                <input type="text" name="search">
                <br>
                <br>
                <button class=" button is-link is-rounded is-small" type="submit" name="send" >Buscar</button>
            </form>   
        </div>        
        <div class="column ">
            <?php 
                if(isset($_GET['send'])){
                    $search = $_GET['search'];
                    $select = "SELECT * FROM estudiantes WHERE MATRICULA LIKE '%".$search."%'";
                    $consulta = $mysql->query($select);

                    $rowcount=mysqli_num_rows($consulta);
                    $found;
                    if($rowcount >1){
                        $found = "Matrículas encontradas: ".$rowcount;
                    }else{
                        $found = "Matrícula encontrada: ".$rowcount;;
                    }
                    
                ?>
                <h2 class="title is-6"><?php echo $found; ?></h2>  
                <form action="" method="POST">
                            <div class="control">
                            <div class="select is-rounded">
                            <select name="mat" required>
                                    <option value="">Elige una Matrícula</option>
                                    <?php while($filas= $consulta->fetch_assoc()){ ?>
                                    <option> <?php echo $filas["MATRICULA"] ?></option>
                                    <?php  }?>
                                    </select>
                                    </div>                                            
                            </div>
        </div>
        <div class="column">
           
                        <h1 class="title is-5">Coloca el rango de fechas</h1>
                        <h4 class="title is-6">Inicio:
                        <input type="date" name="fs">
                        </h4> 
                        <h4 class="title is-6">Fin:
                        <input type="date" name="fe">
                        </h4> 
                        <button class=" button is-link is-rounded is-small" type="submit" name="fin" >Cargar</button>
            </form>
        </div>
      
       </div>
    </div>  
    <?php } ?>
                <?php 
            $Nombre;
            $Matricula ;
            
            $Fecha;
            $Grado;
            $Nivel;

            $p21 = 0;
            $p22 = 0;
            $p23 = 0;
            $p24 = 0;
            $p25 = 0;

            $p31 = 0;
            $p32 = 0;
            $p33 = 0;
            $p34 = 0;
            $p35 = 0;
            $p36 = 0;

            $p4 = 0;
            $p5 = 0;

            if(isset($_POST['fin'])){
                $search = $_POST['mat'];
                $fechaS = $_POST['fs'];
                $fechaE = $_POST['fe'];
                $select_form = "SELECT * FROM form_covid WHERE FECHA BETWEEN '".$fechaS."' AND '".$fechaE."'";
                $select_estudiante = "SELECT * FROM estudiantes WHERE MATRICULA = '".$search."'";
                $consulta_E = $mysql->query($select_estudiante);
                $consulta_F = $mysql->query($select_form);
                $forms=mysqli_num_rows($consulta_F);
                if($forms>0){
                    foreach($consulta_E as $up){
                        $Matricula = $up['MATRICULA'];
                        $Nombre = $up['NOMBRE_C'];
                        $Grado = $up['GRADO'];
                        $Nivel = $up['NIVEL'];
                    }
                    
                    foreach($consulta_F as $ups){
                        
                        if($ups['P21'] == "SI"){
                            $p21 = $p21 + 1;
                        }
                        if($ups['P22'] == "SI"){
                            $p22 = $p22 + 1;
                        }
                        if($ups['P23'] == "SI"){
                            $p23 = $p23 + 1;
                        }
                        if($ups['P24'] == "SI"){
                            $p24 = $p24 + 1;
                        }
                        if($ups['P25'] == "SI"){
                            $p25 = $p25 + 1;
                        }

                        if($ups['P31'] == "SI"){
                            $p31 = $p31 + 1;
                        }
                        if($ups['P32'] == "SI"){
                            $p32 = $p32 + 1;
                        }
                        if($ups['P33'] == "SI"){
                            $p33 = $p33 + 1;
                        }
                        if($ups['P34'] == "SI"){
                            $p34 = $p34 + 1;
                        }
                        if($ups['P35'] == "SI"){
                            $p35 = $p35 + 1;
                        }
                        if($ups['P36'] == "SI"){
                            $p36 = $p36 + 1;
                        }

                        if($ups['P4'] == "SI"){
                            $p4 = $p4 + 1;
                        }
                        if($ups['P5'] == "SI"){
                            $p5 = $p5 + 1;
                        }

                    }
                }else{
                    echo "Sin Datos Que Mostrar";
                }
                if($fechaE == $fechaS){
                    $Fecha = $fechaS;
                }else{
                    $Fecha = $fechaS." - ".$fechaE;
                }
        ?>           
    <div class="">
        <div class="" id="test">
            <div class="mover  title is-3" >
                <h1>Reporte COVID-19</h1> 
            </div>
            <div class="columns">
                <div class="column">
                </div>
                <div class="column">
                </div>
                <div class="column">
                    <h1 class="title is-5">Fecha:</h1>
                <?php echo $Fecha; ?>
                </div>
                
            </div>
            <div class="columns space">
                <div class="column is-full">
                    <h1 class="title is-5">Nombre:</h1>
                    <?php echo $Nombre; ?>
                </div>
                <div class="column">
                </div>
                <div class="column">
                    
                </div>
                <div class="column">
                    
                </div>
            </div>
            <div class="columns space">
                <div class="column is-full">
                    <h1 class="title is-5">Matricula:</h1>
                    <?php echo  $Matricula; ?>
                </div>
                <div class="column">
                </div>
                <div class="column">
                    
                </div>
                <div class="column">
                    
                </div>
            </div>
            <div class="">
            
                <div class="mover" id="cargaBarra"></div>
                
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>
<script type="text/javascript">
    var data = [
        {
            labels:['Con sintomas','Sin sintomas'],
            values:[20,14],
            type: 'pie',
            textinfo: "label+percent",
            textposition: "outside",
            automargin: true

        }
    ];
    var layout = {
    height: 400,
    width: 500,
    title: 'Niños en el colegio con sintomas',
    
    };
    var config ={
        displaylogo: false,
        modeBarButtonsToRemove: ['zoom2d','pan2d','select2d','lasso2d', 'zoomIn2d', 'zoomOut2d', 'autoScale2d', 'resetScale2d']

    };
    Plotly.newPlot('cargaBarra',data,layout,config);
</script>
