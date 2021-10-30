<?php
    $mysql = require_once "conexion.php";
    $perfil = $_POST["perfil"];
    $nombre = $_POST["nombre"];
    $desc = $_POST["descripcion"];
    $medida = $_POST["medida"];
    $cost = $_POST["costo"];
    $cat = $_POST["Categoria"];
    $select = "INSERT INTO `producto`(`PERFIL`, `NAME`, `DESCRIPCION`, `MEDIDA`, `COSTO`, `CATEGORIA`) VALUES (?,?,?,?,?,?)";
    $resultado = $mysql->prepare($select);
    $resultado -> bind_param("ssssds",$perfil,$nombre,$desc,$medida,$cost,$cat);
    $resultado ->execute();
    header("location: index.php");
?>