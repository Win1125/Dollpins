<?php
include_once 'conexion.php';
$obj = new Conexion();
$link = $obj->conectar();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO cargos VALUES('$id', '$cargo') ";			
        $resultado = $link->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM cargos ORDER BY id DESC LIMIT 1";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;

    case 2:        
        $consulta = "UPDATE cargos SET cargo='$cargo' WHERE id='$id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM cargos WHERE id='$id' ";       
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3:        
        $consulta = "DELETE FROM cargos WHERE id='$id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM cargos";
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$link=null;