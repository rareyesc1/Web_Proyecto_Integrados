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

$passNuevo = $_POST['txtNewPass'];
$passNuevoRep = $_POST['txtNewPassRep'];
$CorreoCambioPass = $_POST['txtCorreoCambioPass'];

if ($passNuevo == $passNuevoRep) {
    $pass_cifrado= password_hash($passNuevo, PASSWORD_DEFAULT);
} else {
    echo "Las Contraseñas no Coinciden";
}
$consulta="UPDATE login SET password='$pass_cifrado' WHERE usuario='$CorreoCambioPass'";
$resultado = mysqli_query($conexion, $consulta);

if ($conexion-> query($consulta) === true) {

    $paracorreo = $CorreoCambioPass;
    $titulo = "Cambio de Contraseña";
    $mensaje = "Tu Contraseña se ha Modificado Correctamente";
    $tucorreo = "From: proyectointegrador01n67@gmail.com";

    if (mail($paracorreo, $titulo, $mensaje, $tucorreo)) {
        echo "<script> alert('Se ha modificado la Contraseña correctamente');window.location='../front/../login.php' </script>";
    } else {
        echo "<script> alert('Error');window.location='../front/forgot-password.php' </script>";
    }

} else {
    echo "Error: ".$consulta."<br>".mysqli_error($conexion);
}

?>