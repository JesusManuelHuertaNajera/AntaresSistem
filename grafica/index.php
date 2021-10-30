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

    <div class="box">
        <div class="" id="test">
            <div class="mover  title is-3" >
                <h1>Reporte COVID-19</h1> 
            </div>
            <div class="">
            
                <div class="mover" id="cargaBarra"></div>
                
            </div>
        </div>
    </div>
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
