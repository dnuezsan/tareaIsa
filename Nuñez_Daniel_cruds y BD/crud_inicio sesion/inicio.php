<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Inicio</title>
</head>
<body>
    <div>
    <h1>Bienvenido <?php echo $_SESSION['usuario'];?></h1>
    <p>Has superado la prueba. Ahora deberias volver</p>
    <form action="" method="POST">
        <input type="submit" name="logOut" value="Cerrar sesion">
    </form>
    </div>

    <?php
    require 'metodos_sql.php';

    $conex = new Metodos_sql();
    if (isset($_POST['logOut'])) {
        $conex->destruirSesion();
    }
    ?>
</body>
</html>