<?php   

define('CONEXIONES', 'conexion.php');
require_once('UserClass.php');
require_once(CONEXIONES);
$usuarios = json_decode( $_POST["data"],true);
 $sentencia = "
 INSERT INTO `usuarios`(`nombre`, `apellido1`, `apellido2`, `fechaNacimiento`, `sexo`) 
 VALUES ('{$usuarios['nombre']}','{$usuarios['apellido1']}','{$usuarios['apellido2']}',
 '{$usuarios['fechaNacimiento']}','{$usuarios['sexo']}')";
 $s = $bd->prepare($sentencia);
 $s->execute() or die(print_r($bd->errorInfo(), true));
 echo "Usuario registrado con exito en JSON";
?>