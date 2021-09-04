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

$nombres = $_POST['txtNombres'];
$apellidos = $_POST['txtApellidos'];
$usuario = $_POST['usuario'];
$password = $_POST['txtPassword'];

$pass_cifrado= password_hash($password, PASSWORD_DEFAULT);

$consulta="SELECT*FROM login where usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

$buscarCoincidencia = mysqli_fetch_array($resultado);
$userdb = $buscarCoincidencia['usuario'];

$filas=mysqli_num_rows($resultado);


if ($userdb==$usuario) {
    echo "<script> alert('El correo $usuario ya está registrado');window.location='../front/register.php' </script>";
} else {
    if ($filas==0) {
        $queryRegistrar = "INSERT INTO login(nombres,apellidos,usuario,password) values ('$nombres','$apellidos','$usuario','$pass_cifrado')";
        if (mysqli_query($conexion, $queryRegistrar)) {
            echo "<script> alert('Usuario Registrado: $usuario');window.location='../index.php' </script>";
        } else {
            echo "Error: ".$queryRegistrar."<br>".mysqli_error($conexion);
        }
    } else {
        "<script> alert('No puedes registrar este correo: $usuario');window.location='../front/register.php' </script>";
    }
}

?>