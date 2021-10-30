<?php
$enlace =   mysqli_connect('localhost', 'root', '','graficos');
if (!$enlace) {
    die('No pudo conectarse: ');
}
//echo 'Conectado satisfactoriamente';
return $enlace;
$enlace->close();
?>