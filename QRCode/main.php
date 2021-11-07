
<?php

//load the ar library
include 'phpqrcode/qrlib.php'; 

// CARGA LA CONEXION CON LA BASE DE DATOS
$mysql = require_once "../conexion.php";

//LOS VALORES SE COLOCAN EN VARIABLES
$matricula = $_POST["matricula"];

if (!isset($_POST['v21'])) {
  $p21 = "NO";
}else{$p21 = "SI";}

if (!isset($_POST['v22'])) {
  $p22 = "NO";
}else{$p22 = "SI";}

if (!isset($_POST['v23'])) {
  $p23 = "NO";
}else{$p23 = "SI";}

if (!isset($_POST['v24'])) {
  $p24 = "NO";
}else{$p24 = "SI";}

if (!isset($_POST['v25'])) {
  $p25 = "NO";
}else{$p25 = "SI";}

if (!isset($_POST['v26'])) {
  $p26 = "NO";
}else{$p26 = "SI";}

if (!isset($_POST['v31'])) {
  $p31 = "NO";
}else{$p31 = "SI";}

if (!isset($_POST['v32'])) {
  $p32 = "NO";
}else{$p32 = "SI";}

if (!isset($_POST['v33'])) {
  $p33 = "NO";
}else{$p33 = "SI";}

if (!isset($_POST['v34'])) {
  $p34 = "NO";
}else{$p34 = "SI";}

if (!isset($_POST['v35'])) {
  $p35 = "NO";
}else{$p35 = "SI";}

if (!isset($_POST['v36'])) {
  $p36 = "NO";
}else{$p36 = "SI";}

if (!isset($_POST['v37'])) {
  $p37 = "NO";
}else{$p37 = "SI";}


$intera = $_POST["intera"];

$contact = $_POST["contact"];

//TOMA LA HORA Y FECHA DE LA CIUDAD DE MEXICO
date_default_timezone_set('America/Mexico_City');    
$fecha = date('Y-m-d');  
$pass = 0;
if($p21=="SI" OR $p22=="SI" OR $p23=="SI" OR $p24=="SI" OR $p25=="SI" OR $p26=="SI"
OR $p31=="SI" OR $p32=="SI" OR $p33=="SI" OR $p34=="SI" OR $p35=="SI" OR $p36=="SI" OR $p37=="SI"
OR $intera == "SI" OR $contact == "SI"
){
  $select = "INSERT INTO `FORM_COVID`(`P1`, `P21`, `P22`, `P23`, `P24`,`P25`, `P26`, `P31`, `P32`, `P33`,`P34`, `P35`, `P36`, `P37`, `P4`,`P5`, `FECHA`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $resultado = $mysql->prepare($select);
  $resultado -> bind_param("sssssssssssssssss",$matricula,
  $p21,$p22,$p23,$p24,$p25,$p26
  ,$p31,$p32,$p33,$p34,$p35,$p36,$p37
  ,$intera,$contact,$fecha);
  $resultado ->execute();
  header("location: ../warning.php");
//}elseif($olf =="Si"){
  //header("location: ../warning.php");
//}
//elseif($fiebre=="Si"){
  //header("location: ../warning.php");
  
}
else{
  $check = "SELECT * FROM estudiantes WHERE MATRICULA ="."'".$matricula."'";
  $res = $mysql->query($check);
  $i = 0;
  $persona = $res-> fetch_all(MYSQLI_ASSOC);
  foreach($persona as $up){
      $i=$i+1;
  }

  if($i > 0){
    
    //INSERTA LOS DATOS A LA BASE DE DATOS
    $select = "INSERT INTO `FORM_COVID`(`P1`, `P21`, `P22`, `P23`, `P24`,`P25`, `P26`, `P31`, `P32`, `P33`,`P34`, `P35`, `P36`, `P37`, `P4`,`P5`, `FECHA`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $resultado = $mysql->prepare($select);
    $resultado -> bind_param("sssssssssssssssss",$matricula,
    $p21,$p22,$p23,$p24,$p25,$p26
    ,$p31,$p32,$p33,$p34,$p35,$p36,$p37
    ,$intera,$contact,$fecha);
    $resultado ->execute();
    //header("location: index.php");

    

    //--------------------GENERAR QR----------------------------
    //data to be stored in qr
    $text = strval($matricula);
      
    //file path
    $file = "./".$matricula.".jpg";

    //other parameters
    $ecc = 'H';
    $pixel_size = 20;
    $frame_size = 5;
      
    // Generates QR Code and Save as PNG
    QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);

    //TERMINA EL PROCESO MANDANDO A LA PANTALLA FINAL
    header("location: ../endform.php?mat=$matricula");
  }else{
    header("location: ../materror.php");
    }
  }
  
?>
