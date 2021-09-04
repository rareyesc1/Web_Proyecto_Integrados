<?php

/**
 * PHP version 8.0
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <rareyesc19960629@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

require 'db.php';
session_start();

$correo = $_POST['txtCorreo'];

$consulta = ("SELECT*FROM login where usuario='$correo'");
$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if ($filas == 1) {

        $URL = "http://localhost:8080/Proyectos_Integradores_V2/front/cambiar_pass.php";
        $mostrar = mysqli_fetch_array($resultado);
        $enviarpass = $mostrar['password'];
        $paracorreo = $correo;
        $titulo = "Restablecer Contraseña";
        $mensaje = "Ingrese a la siguiente URL para cambiar su contraseña: ".$URL;
        $tucorreo = "From: proyectointegrador01n67@gmail.com";

        $cabeceras = 'MIME-Version: 1.0'."\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

    if (mail($paracorreo, $titulo, $mensaje, $tucorreo)) {
        echo "<script> alert('Contraseña Enviada');window.location='../login.php' </script>";
    } else {
        echo "<script> alert('Error');window.location='forgot-password.php' </script>";
    }
} else {
    echo "Algo anda mal";
}

?>