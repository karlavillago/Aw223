<?php
require_once("conexion.php");
$nombre=$_POST["txtnombre"];
$nombre=$_POST["txtcorreo"];
$nombre=$_POST["txtmensaje"];

$sqlinsert="INSERT INTO mensajes(nombre,correo,mensaje) VALUES(?,?,?,)";
$stmt=$conexion->preparate("sqlInsert");

$stmt->bind_param("sss",$nombre,$correo,$mensaje);
if($stmt->execute()){
    echo "mensaje guardado";
}else{
    echo"Error al intentar guardar";
}