<?php

define('CONEXIONES', 'conexion.php');
require_once('UserClass.php');
require_once(CONEXIONES);
    $method = $_SERVER['REQUEST_METHOD'];
    if ('DELETE' === $method) {
        parse_str(file_get_contents("php://input"),$post_vars);        
        $sentencia = "DELETE FROM usuarios WHERE id =".$post_vars['id'];
        $count = $bd->exec($sentencia) or die(print_r($bd->errorInfo(), true));
        return true;
    }
?>