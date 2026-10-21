<?php
require_once "conexion.php";

$id      = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
$nombre  = trim($_POST["txtnombre"] ?? "");
$correo  = trim($_POST["txtcorreo"] ?? "");
$mensaje = trim($_POST["txtmensaje"] ?? "");


if($id<=0 || $nombre==="" || $correo==="" || $mensaje==="" || !filter_var($correo,FILTER_VALIDATE_EMAIL)){
    header("Location:editar.php?id=".$id."&estadophp=vacio");
    exit;
}

$sqlUpdate="UPDATE mensajes SET nombre=?, correo=?, mensaje=? WHERE id=?";
$stmt=$conexion->prepare($sqlUpdate);
$stmt->bind_param("sssi",$nombre,$correo,$mensaje,$id);

if($stmt->execute()){
    header("Location:admin.php?estadophp=actualizado");
}else{
    header("Location:admin.php?estadophp=errorActualizar");
}
exit;