<?php
include_once 'conexion.php';
$obj = new Conexion();
$link = $obj->conectar();

$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$password = sha1($password);
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO usuarios VALUES('$user_id','$nombre','$username', '$correo','$password', '$telefono','$direccion') ";
        $resultado = $link->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1";
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    

    case 2:        
        $consulta = "UPDATE usuarios SET nombre='$nombre', usuario='$username', correo='$correo', passw='$password', telefono='$telefono', direccion = '$direccion' WHERE id='$user_id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM usuarios WHERE id='$user_id' ";       
        $resultado = $link->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM usuarios WHERE id='$user_id' ";		
        $resultado = $link->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM usuarios";
        $resultado = $link->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$link=null;