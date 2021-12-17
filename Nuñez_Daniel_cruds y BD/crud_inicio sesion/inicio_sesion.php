<?php
session_start();
if (!empty($_POST['usuario'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Inicio sesión</title>
</head>
<body>
    <div>
    <h2>Inicio de sesión</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td><input type="text" name="usuario" placeholder="Usuario"></td>
            </tr>
            <tr>
                <td><input type="text" name="contrasenia" pattern="^[a-zA-Z0-9]{3,15}$" placeholder="contraseña"></td>
            </tr>
        </table>
        <input type="submit" name="registro" value="Iniciar sesión">
    </form>
    </div>
    <?php
    require 'metodos_sql.php';

    $conexion = new Metodos_sql();
    if(isset($_POST['registro'])){
        $conexion->verificar();
    }
    ?>
</body>
</html>