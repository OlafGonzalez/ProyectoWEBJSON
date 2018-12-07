<?php

define('CONEXIONES', 'conexion.php');
require_once('UserClass.php');
require_once(CONEXIONES);
$sentencia = "Select * from usuarios;";
$s = $bd->prepare($sentencia);
$s->execute();
$usuarios = array();
$r = $s->fetchAll();
foreach ($r as &$row) {
    $usuario = new Usuario();
    $usuarios[] = $usuario->parseUsuarios($row);
}
echo json_encode($usuarios,true);