<?php
include_once 'conexion.php';
$obj = new Conexion();
$link = $obj->conectar();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';
$total = (isset($_POST['total'])) ? $_POST['total'] : '';
$fecha_hora = (isset($_POST['fecha_hora'])) ? $_POST['fecha_hora'] : '';
$aprobacion = (isset($_POST['aprobacion'])) ? $_POST['aprobacion'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opcion) {
    case 1:
        $consulta = "INSERT INTO factura VALUES('$id', '$id_usuario', '$total', '$fecha_hora', '$aprobacion') ";
        $resultado = $link->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM factura ORDER BY id DESC LIMIT 1";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2:
        $consulta = "UPDATE factura SET id_usuario = '$id_usuario', total='$total', fecha_hora='$fecha_hora', aprobacion = '$aprobacion' WHERE id='$id' ";
        $resultado = $link->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM factura WHERE id='$id' ";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3:
        $consulta = "DELETE FROM factura WHERE id='$id' ";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        break;

    case 4:
        $consulta = "SELECT * FROM factura";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$link = null;
?>
