<?php

ob_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Graficos test</title>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="plotly-2.4.2.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="">Generar reporte</a>
        <div class="row" id="test">
            <div class="col-sm-12">
                <div class="panel panel-heading">Graficos plotly js</div>  
            </div>
            <div class="panel panel-body">
                <div class="row">
                    <div class="col-sm-6">
                    <img src="https://quickchart.io/chart?c={type:'pie',data:{labels:['January','February', 'March','April', 'May'], datasets:[{data:[50,60,70,180,190]}]}}">
                    </div>
                </div>
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
<?php 
$html=ob_get_clean();

require_once "libreria/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->setPaper('A4','lanscape');
$dompdf->render();
#descargar
#$dompdf->stream('reporte.pdf',array("attachment"=> true));

#ver doc
$dompdf->stream('reporte.pdf',array("Attachment"=> false));
?>