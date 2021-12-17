<?php
require 'config.php';

class Metodos_registro
{

    protected $conexion;
    //Crea conexion con la base de datos
    function __construct()
    {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASEÑA, BD);
        if ($this->conexion->connect_errno) {
            echo 'Se ha producido un error: ' . $this->conexion->connect_error;
        }
    }

    //Metodo que enviar los datos del registro a la BD
    function registro()
    {
        $sql1 = 'INSERT INTO usuario VALUES ("' . $_POST['usuario'] . '", "' . $_POST['contrasenia'] . '")';

        $resultado1 = $this->conexion->query($sql1);
        //Esta segunda consulta envia las preferencias
        if ($resultado1) {
            if (!empty($_POST['lista_check'])) {
                foreach ($_POST['lista_check'] as $check) {
                    $sql2 = 'INSERT INTO preferencia VALUES ("' . $_POST['usuario'] . '", "' . $check . '")';
                    $resultado2 = $this->conexion->query($sql2);
                }
            }
           
        }  
        //Comprueba que al menos usuario y contraseña fueron subidos
        if ($resultado1) {
            echo 'Se ha registrado el usuario adecuadamente';
        }else{
            echo 'No se puedo finalizar el registro';
        }
        
    }

    //Metodo que genera dinámicamente checks
    function generarCheck()
    {

        $sql = 'SELECT * FROM minijuego';

        $resultado = $this->conexion->query($sql);
        echo '<p>Por favor elige los juegos que prefieras:</p>';
        echo '<table>';
        while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td><input type="checkbox" name = "lista_check[]" value = "' . $fila['idMinijuego'] . '">' . $fila['nombre'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
