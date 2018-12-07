<?php 
    
class Persona
{
    var $id;
    var $nombre;
    var $apellido1;
    var $apellido2;
    var $fechaNacimiento;
    var $sexo;
    var $fechaRegistro;
    function _construct()
    {
        
    }
}

class Usuario extends Persona
{
    function _construct()
    {
        parent::_construct();
    }
    public function dumps()
    {
        var_dump(get_object_vars($this));    
    }
    function parseUsuarios($row){
        $this->id=$row[0];
        $this->nombre=$row[1];
        $this->apellido1=$row[2];
        $this->apellido2=$row[3];
        $this->fechaNacimiento=$row[4];
        $this->sexo=$row[5];
        return $this;
}
}
?>