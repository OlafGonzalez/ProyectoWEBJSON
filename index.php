
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi primer PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Mi primer pagina</h1>
    <?php
        $hola="<p>Hola mundo</p>";
        echo $hola;
    ?>
    <table>
        <tr>
            <td>IpV6 cliente:</td>
        </tr>
        <tr>
            <td>HTTP - MéTODO</td>
            <td><?php echo $_SERVER['REQUEST_METHOD'];?></td>
        </tr>
    </table>
    <h2>Variables del mensaje HTTP</h2>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            var_dump($_GET);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            var_dump($_POST);
        }
    ?>
</body>
</html>