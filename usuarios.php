<?php 
    
class Persona
{
    var $nombre;
    var $apellido1;
    var $apellido2;
    var $fechaNacimiento;
    var $sexo;
    var $fechaRegistro;
    
    
    function _construct()
    {
        $this-> nombre="Emma";
        $this-> apellido1="Labra";
        $this-> apellido2="Valero";
        $this-> fechaNacimiento ="2000-01-01";
        $this-> fechaRegistro=getdate();
    }
}

class Usuario extends Persona
{
    function _construct()
    {
        parent::_construct();
    }
}

    $ListaUsuario = array(
        new Usuario(),
        new Usuario()
     );
    //var_dump($ListaUsuario);
    
    function FilasUsuarios($lista)
    {
        $respuesta ="";
        for ($i=0; $i < count($lista); $i++) { 
            $respuesta = $respuesta."\n<tr>\n<td>".$i."</td>\n<td>".
            $lista[$i]-> nombre."</td>\n<td>".
            $lista[$i]-> apellido1."</td>\n<td>".
            $lista[$i]-> apellido2."</td>\n<td>".
            $lista[$i]-> fechaNacimiento."</td>\n<td>".
            $lista[$i]-> sexo."</td>\n<td>";
        }
        return $respuesta;
       
    }


    $server = "localhost";
    $bd = "web2";
    $usuario = "root";
    $pass = "";

    $mysqli = new mysqli($server, $usuario, $pass, $bd);
    if($mysqli-> connect_errno){
        echo "Fallo al conectar a bd: ". $mysqli->connect_errno;
    }else {
   //     echo "Conectando a BD";
    }

    function usuariosBD()
    {
        global $mysqli;
        $consulta = "Select * from usuarios;";
        $resultado = $mysqli->query($consulta);
        while ($fila = $resultado->fetch_array(MYSQLI_NUM)) {
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->nombre = $fila[1];
            $nuevoUsuario->apellido1 = $fila[2];
            $nuevoUsuario->apellido2 = $fila[3];
            $nuevoUsuario->fechaNacimiento = $fila[4];
            $nuevoUsuario->sexo = $fila[5];
            
            $usuario[]=$nuevoUsuario;
        }
        return $usuario;
    }
  
?>