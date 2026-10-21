<?php
require_once "conexion.php";

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

if($id<=0){
    header("Location:admin.php?estadophp=errorBorrar");
    exit;
}

$sqlDelete="DELETE FROM mensajes WHERE id=?";
$stmt=$conexion->prepare($sqlDelete);
$stmt->bind_param("i",$id);

if($stmt->execute()){
    header("Location:admin.php?estadophp=borrado");
}else{
    header("Location:admin.php?estadophp=errorBorrar");
}
exit;