<?php
include_once 'conexion.php';
$obj = new Conexion();
$link = $obj->conectar();

$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$password = sha1($password);
$cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO empleados VALUES('$user_id', '$nombre', '$correo','$password', '$cargo') ";			
        $resultado = $link->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM empleados ORDER BY id DESC LIMIT 1";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE empleados SET nombre='$nombre', correo='$correo', passw='$password', id_cargo='$cargo' WHERE id='$user_id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM empleados WHERE id='$user_id' ";       
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM empleados WHERE id='$user_id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM empleados";
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$link=null;