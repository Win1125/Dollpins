<?php
include_once 'conexion.php';
$obj = new Conexion();
$link = $obj->conectar();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$valor = (isset($_POST['valor'])) ? $_POST['valor'] : '';
$id_categoria = (isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : '';
$existencias = (isset($_POST['existencias'])) ? $_POST['existencias'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO productos VALUES('$id','$nombre','$descripcion','$valor','$id_categoria','$existencias','$estado') ";
        $resultado = $link->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM productos ORDER BY id DESC LIMIT 1";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    

    case 2:        
        $consulta = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', valor = '$valor', id_categoria = '$id_categoria', existencias = '$existencias', estado = '$estado' WHERE id = '$id'";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM productos WHERE id='$id' ";       
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3:        
        $consulta = "DELETE FROM productos WHERE id='$id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM productos";
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$link=null;