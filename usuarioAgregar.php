<?php
    require('usuarios.php');
    
    $usuarioNuevo = new Usuario();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $usuarioNuevo->nombre = $_POST['nombre'];
        $usuarioNuevo->apellido1 = $_POST['apellido1'];
        $usuarioNuevo->apellido2 = $_POST['apellido2'];
        $usuarioNuevo->fechaNacimiento = $_POST['fechaNacimiento'];
        $usuarioNuevo->sexo = $_POST['sexo'];
        //$usuarioNuevo->fechaRegistro = $_POST['fechaRegistro'];

    }else if($_SERVER['REQUEST_METHOD']=='GET'){
        $usuarioNuevo->nombre = $_GET['nombre'];
        $usuarioNuevo->apellido1 = $_GET['apellido1'];
        $usuarioNuevo->apellido2 = $_GET['apellido2'];
        $usuarioNuevo->fechaNacimiento = $_GET['fechaNacimiento'];
        $usuarioNuevo->sexo = $_GET['sexo'];
        //$usuarioNuevo->fechaRegistro = $_GET['fechaRegistro'];
    }
    // creamos una consulta de nivel de datos
    $insercion = "insert into usuarios(nombre,apellido1,apellido2,fechaNacimiento,sexo) values ('".
        $usuarioNuevo->nombre."','".
        $usuarioNuevo->apellido1."','".
        $usuarioNuevo->apellido2."','".
        $usuarioNuevo->fechaNacimiento."','".
        $usuarioNuevo->sexo."')";

        if($resultado = $mysqli->query($insercion)){
            echo "insertado correctamente con php";
            
        }    
    ?>
