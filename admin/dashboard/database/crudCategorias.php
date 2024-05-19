<?php
include_once 'conexion.php';
$obj = new Conexion();
$link = $obj->conectar();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO categoria VALUES('$id','$categoria') ";
        $resultado = $link->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM categoria ORDER BY id DESC LIMIT 1";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    

    case 2:        
        $consulta = "UPDATE categoria SET categoria='$categoria' WHERE id='$id'";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM categoria WHERE id='$id' ";       
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3:        
        $consulta = "DELETE FROM categoria WHERE id='$id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM categoria";
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$link=null;