<?php
  $matricula = $_GET['mat'];
  $imagen = "./images/".$matricula.".jpg";
  //file path
  $file = $imagen;
  //TOMA LA RUTA DE LA IMAGEN PARA PODER DESCARGAR SU QR EN EL DISPOSITIVO
  $img = $file;
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='.basename($img));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  header('Pragma: public');
  header('Content-Length: ' . filesize($img));
  ob_clean();
  flush();
  readfile($img);
  ?>  
