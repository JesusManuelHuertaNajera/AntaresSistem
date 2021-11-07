
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
//load the ar library
include 'phpqrcode/qrlib.php'; 

// CARGA LA CONEXION CON LA BASE DE DATOS
$mysql = require_once "../../conexion.php";

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

$uso = 1;
//TOMA LA HORA Y FECHA DE LA CIUDAD DE MEXICO
date_default_timezone_set('America/Mexico_City');    
$fecha = date('Y-m-d');  

$tipo = "PERSONAL";

$revisar = "SELECT * FROM FORM_COVID WHERE FECHA = "."'".$fecha."'" ." AND P1 ="."'".$matricula."'"." AND tipo ="."'".$tipo."'";
$resp = $mysql->query($revisar);
$rowcount=mysqli_num_rows($resp);

if($rowcount > 0){
    $texto = "Error: Solo Puedes Hacer Tu Registro Una Vez Al Dia.";
    header("location: ../resp/materror.php?text=$texto");
}else{
    $check = "SELECT * FROM PERSONAL WHERE CORREO ="."'".$matricula."'";
    $res = $mysql->query($check);
    $matT=mysqli_num_rows($resp);
    $i = 0;
    $Fo_name;
    $Fo_date = $fecha;
    foreach($res as $up){
      $i=$i+1;
      $Fo_name=$up['NOMBRE']." ".$up['APELLIDOS'];
      
    }
    echo $i;
    if($i > 0){
        if($p21=="SI" or $p22=="SI" or $p23=="SI" or $p24=="SI" or $p25=="SI" or $p31=="SI" or $p32=="SI" or $p33=="SI" or $p34=="SI" or $p35=="SI" or $p36=="SI"             or $intera == "SI" or $contact == "SI"){
        $p26 = "NO";
        $p37 = "NO";
        //INSERTA LOS DATOS A LA BASE DE DATOS
        $select = "INSERT INTO `FORM_COVID`(`P1`, `P21`, `P22`, `P23`, `P24`,`P25`, `P26`, `P31`, `P32`, `P33`,`P34`, `P35`, `P36`, `P37`, `P4`,`P5`, `FECHA`,                `USO`,`TIPO`) VALUES           (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $resultado = $mysql->prepare($select);
        $resultado -> bind_param("sssssssssssssssssis",$matricula,
        $p21,$p22,$p23,$p24,$p25,$p26
        ,$p31,$p32,$p33,$p34,$p35,$p36,$p37
        ,$intera,$contact,$fecha,$uso,$tipo);
        $resultado ->execute();
        
        header("location: ../resp/warning.php");
        }else{
            $p26 = "SI";
            $p37 = "SI";
            //INSERTA LOS DATOS A LA BASE DE DATOS
            $select = "INSERT INTO `FORM_COVID`(`P1`, `P21`, `P22`, `P23`, `P24`,`P25`, `P26`, `P31`, `P32`, `P33`,`P34`, `P35`, `P36`, `P37`, `P4`,`P5`, `FECHA`,`USO`,`TIPO`) VALUES           (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $resultado = $mysql->prepare($select);
            $resultado -> bind_param("sssssssssssssssssis",$matricula,
            $p21,$p22,$p23,$p24,$p25,$p26
            ,$p31,$p32,$p33,$p34,$p35,$p36,$p37
            ,$intera,$contact,$fecha,$uso,$tipo);
            $resultado ->execute();
            //header("location: index.php");

            $content_id;
            $ObtenerId = "SELECT ID FROM FORM_COVID WHERE FECHA = "."'".$fecha."'" ." AND P1 ="."'".$matricula."'";
            $info = $mysql->query($ObtenerId);
            foreach($info as $text){
              $content_id = $text['ID'];
            }
            //--------------------GENERAR QR----------------------------
            //data to be stored in qr
            $text = strval($content_id);
            
            //file path
            $file = "./images/".$matricula.".jpg";

            //other parameters
            $ecc = 'H';
            $pixel_size = 20;
            $frame_size = 5;
            
            // Generates QR Code and Save as PNG
            QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);

            //TERMINA EL PROCESO MANDANDO A LA PANTALLA FINAL
            header("location: ../resp/endform.php?mat=$matricula&name=$Fo_name&date=$Fo_date");
        }
    }else{
        $texto = "Error Con El Correo";
        header("location: ../resp/materror.php?text=$texto");
    }
    }
?>
