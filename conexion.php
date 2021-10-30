<?php
$enlace =   mysqli_connect('localhost', 'root', '','colegio');
if (!$enlace) {
    die('No pudo conectarse: ');
}
//echo 'Conectado satisfactoriamente';
//$enlace =   mysqli_connect('sql211.epizy.com', 'epiz_30185117', 'I2ZnJS7Tt8C','epiz_30185117_colegio');
//$enlace =   mysqli_connect('31.22.4.234', 'colegioa_colegioa', 'kx]%9]@M^1~D','colegioa_colegioantares');
return $enlace;
$enlace->close();
?>