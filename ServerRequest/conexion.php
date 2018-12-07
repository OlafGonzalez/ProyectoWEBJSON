<?php
try
{
	$myhost='localhost';
	$myuser='root';
	$mypass='';
    $dbname='web2';
    
	$bd = new PDO("mysql:host=$myhost;dbname=$dbname", $myuser, $mypass);	
	if(!$bd)
	{
		die("Error de conexion a la base de datos: ");
    }
}catch (PDOExeption $e)
    {
        throw new Exception('Error de coexion '.$e->getMessage());
    }
    
    
?>