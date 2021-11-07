<?php
date_default_timezone_set('Europe/Amsterdam');    
$DateAndTime = date('m-d-Y h:i:s a', time());  
echo "The current date and time in Amsterdam are $DateAndTime.\n";
date_default_timezone_set('America/Mexico_City');    
$DateAndTime2 = date('m-d-Y h:i:s a', time());  
echo "The current date and time in Toronto are $DateAndTime2.";

date_default_timezone_set('America/Mexico_City');    
$DateAndTime3 = date('m-d-Y ');  
echo "LA hora en mexico es $DateAndTime3.";

$fecha=date_parse_from_format('Y-m-d',"2021-09-28");


$matricula = '16AJCE1K0079';
$mysql = require_once "../conexion.php";

$check = "SELECT * FROM estudiantes WHERE MATRICULA ="."'".$matricula."'";
$res = $mysql->query($check);
$i = 0;
if(!isset($res)){
    ECHO "valio";
}

$persona = $res-> fetch_all(MYSQLI_ASSOC);
foreach($persona as $up){
    $i=$i+1;
    echo $up["MATRICULA"];
    ECHO $i;
}

ECHO $i;
//SELECT ALL THE DATA
 $file = "./".$matricula.".jpg";

?>