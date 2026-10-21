<?php
function consultaMensajes(){
    require_once "conexion.php";
    
    $selectMsj="select * from mensajes";
    try{
        $rsMsj=mysqli_query($conexion,$selectMsj);
        mysqli_close($conexion);
        return $rsMsj;


    }catch(Exception $e){
        die('Algo paso al consultar:'.$e->getMessage());
    }
}


function consultaMensajePorId($id){
    require_once "conexion.php";

    $sqlSelect="SELECT id, nombre, correo, mensaje FROM mensajes WHERE id=?";
    $stmt=$conexion->prepare($sqlSelect);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $resultado=$stmt->get_result();
    $fila=$resultado->fetch_assoc();
    $stmt->close();
    $conexion->close();
    return $fila; // null si no existe
}