<?php
 require_once "conexion.php";
?>
<div id="graficaBarras"></div>

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
    Plotly.newPlot('graficaBarras',data,layout,config);
</script>