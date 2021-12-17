<?php

require 'config.php';

class Metodos_sql{

    protected $conexion;

    function __construct()
    {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASEÑA, BD);
    }

    function verificar(){
        $sql = 'SELECT * FROM usuario WHERE usuario = "'.$_POST['usuario'].'" AND contrasenia = "'.$_POST['contrasenia'].'"';
        $resultado = $this->conexion->query($sql);
        if ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
            header('Location: inicio.php');
        }else{
            echo '<br /><span>Usuario o contraseña incorrectos</span>';
        }
    }

    function destruirSesion(){
        session_destroy();
        header('Location: inicio_sesion.php');
    }
}
