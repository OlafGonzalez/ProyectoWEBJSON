<?php   

define('CONEXIONES', 'conexion.php');
require_once('UserClass.php');
require_once(CONEXIONES);
$method = $_SERVER['REQUEST_METHOD'];
if ('PUT' === $method) {
parse_str(file_get_contents("php://input"),$post_vars);
$usuarios = json_decode( $post_vars["data"],true);
$sentencia = "
UPDATE `usuarios` SET 
    `nombre` = '{$usuarios['nombre']}',
    `apellido1` = '{$usuarios['apellido1']}',
    `apellido2` = '{$usuarios['apellido2']}',
    `fechaNacimiento` = '{$usuarios['fechaNacimiento']}',
    `sexo` = '{$usuarios['sexo']}' WHERE `usuarios`.`id` = {$usuarios['iduser']}";
    $count = $bd->exec($sentencia) or die(print_r($bd->errorInfo(), true));
    return true;
}
?>