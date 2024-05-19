<?php
class Conexion{
    public static function Conectar(){

        define('host', 'localhost');
        define('user', 'root');
        define('pass', '');
        define('bd', 'dollpins');
        $opcion=array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');
        try{
            $link=new PDO("mysql:host=".host.";dbname=".bd,user,pass,$opcion);
            return $link;
        }catch(Exception $e){
            die("Error en la Conexion de la BD ".$e->getMessage());
        }
    } 
}
?>