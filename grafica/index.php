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
                <input type="text" name="search" required>
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
                        <input type="date" name="fs" required>
                        </h4> 
                        <h4 class="title is-6">Fin:
                        <input type="date" name="fe" required>
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
            $p26 = 0;

            $p31 = 0;
            $p32 = 0;
            $p33 = 0;
            $p34 = 0;
            $p35 = 0;
            $p36 = 0;
            $p37 = 0;

            $p4 = 0;
            $p5 = 0;
            $pn4 = 0;
            $pn5 = 0;


            if(isset($_POST['fin'])){
                $search = $_POST['mat'];
                $fechaS = $_POST['fs'];
                $fechaE = $_POST['fe'];
                $select_form = "SELECT * FROM form_covid WHERE FECHA BETWEEN '".$fechaS."' AND '".$fechaE."'";
                $select_estudiante = "SELECT * FROM estudiantes WHERE MATRICULA = '".$search."'";
                $consulta_E = $mysql->query($select_estudiante);
                $consulta_F = $mysql->query($select_form);
                $forms=mysqli_num_rows($consulta_F);

                if($fechaE == $fechaS){
                    $Fecha = $fechaS;
                }else{
                    $Fecha = $fechaS." - ".$fechaE;
                }
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
                        }else{$pn4 = $pn4+1;}
                        if($ups['P5'] == "SI"){
                            $p5 = $p5 + 1;
                        }else{$pn5 = $pn5+1;}

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
                <div class="column ">
                    <h1 class="title is-5">Nombre:</h1>
                    <?php echo $Nombre; ?>
                </div>
                <div class="column">
                </div>
                <div class="column">
                    <h1 class="title is-5">Grado:</h1>
                    <?php echo  $Grado; ?>
                </div>
                <div class="column">
                </div>
            </div>
            <div class="columns space">
                <div class="column ">
                    <h1 class="title is-5">Matrícula:</h1>
                    <?php echo  $Matricula; ?>
                </div>
                <div class="column">
                </div>
                <div class="column">
                    <h1 class="title is-5">Nivel:</h1>
                    <?php echo  $Nivel; ?>
                </div>
                <div class="column">
                </div>
            </div>
            <div class="">
                <div class="mover" id="cargaBarra"></div>
                <div class="mover" id="cargaBarras"></div>
                <h1 class="textos title is-6">3.-¿Has regresado de algún viaje internacional en los ultimos 14 dias?</h1>
                <div class="mover" id="siQ"></div>
                <h1 class="textos title is-6">4.-¿Eres un contacto cercano de alguna persona que padece COVID-19 confirmado?</h1>
                <div class="mover" id="siQs"></div>
            </div>
        </div>
    </div>
    <?php 
            }else{
         ?>
        <div class="">
        <div class="" id="test">
            <div class="mover  title is-3" >
                <h1>Sin Datos Que Mostrar De Ese Rango De Fechas</h1> 
            </div>
        </div>
    </div>
    <?php  
        }
    } ?>
</body>
</html>
<script type="text/javascript">
    var data = [
        {
            labels:['Fiebre','Dificultad al respirar','Escalofríos','Tos','Pérdida de gusto u olfato','Ninguna de las anteriores'],
            values:[4,0,15,0,2,6,0],
            type: 'pie',
            textinfo: "label+percent",
            textposition: "outside",
            automargin: true

        }
    ];
    var layout = {
    height: 400,
    width: 500,
    title: '1.- ¿Actualmente tienes uno de estos síntomas?',
    
    };
    var config ={
        displaylogo: false,
        modeBarButtonsToRemove: ['zoom2d','pan2d','select2d','lasso2d', 'zoomIn2d', 'zoomOut2d', 'autoScale2d', 'resetScale2d']

    };
    Plotly.newPlot('cargaBarra',data,layout,config);

    var datas = [
        {
            labels:['Dolor de garganta','Fatiga','Dolor de cabeza','Dolor de cuerpo o muscular','Náuseas o vómito','Diarrea','Ninguna de las anteriores'],
            values:[2,1,5,0,2,3,0],
            type: 'pie',
            textinfo: "label+percent",
            textposition: "outside",
            automargin: true

        }
    ];
    var layouts = {
    height: 400,
    width: 500,
    title: '2.- ¿Actualmente tienes uno de estos síntomas?',
    
    };
    var configs ={
        displaylogo: false,
        modeBarButtonsToRemove: ['zoom2d','pan2d','select2d','lasso2d', 'zoomIn2d', 'zoomOut2d', 'autoScale2d', 'resetScale2d']

    };
    Plotly.newPlot('cargaBarras',datas,layouts,configs);

    var dato = [
        {
            labels:['No','Si'],
            values:[2,1],
            type: 'pie',
            textinfo: "label+percent",
            textposition: "outside",
            automargin: true

        }
    ];
    var layou = {
    height: 400,
    width: 500,
    
    };
    var confi ={
        displaylogo: false,
        modeBarButtonsToRemove: ['zoom2d','pan2d','select2d','lasso2d', 'zoomIn2d', 'zoomOut2d', 'autoScale2d', 'resetScale2d']

    };
    Plotly.newPlot('siQ',dato,layou,confi);

    var datos = [
        {
            labels:['No','Si'],
            values:[4,0],
            type: 'pie',
            textinfo: "label+percent",
            textposition: "outside",
            automargin: true

        }
    ];
    var layous = {
    height: 400,
    width: 500,
    
    
    };
    var confis ={
        displaylogo: false,
        modeBarButtonsToRemove: ['zoom2d','pan2d','select2d','lasso2d', 'zoomIn2d', 'zoomOut2d', 'autoScale2d', 'resetScale2d']

    };
    Plotly.newPlot('siQs',datos,layous,confis);
</script>
