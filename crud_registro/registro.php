<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Registro</title>
</head>

<body>
    <div>
        <h2>Registro</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><input type="text" name="usuario" placeholder="Nombre de usuario" pattern="^[a-zA-Z0-9]{3-15}$"></td>
                </tr>
                <tr>
                    <td><input type="text" name="contrasenia" placeholder="Contraseña" pattern="^[a-zA-Z0-9]{3-10}$"> <br /></td>
                </tr>
            </table>


            <?php
            require 'metodos_registro.php';
            echo '<br />';
            $conexion = new Metodos_registro();

            $conexion->generarCheck();
            $kal = new Metodos_registro();
            if (isset($_POST['enviar'])) {
                $kal->registro();
            }
            ?>

            <input type="submit" id="boton" name="enviar" value="enviar">
        </form>
    </div>
</body>

</html>