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

$usuario=$_POST['txtUsuario'];
$pass=$_POST['txtPassword'];

$consulta="SELECT*FROM login where usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
$buscar_pass = mysqli_fetch_array($resultado);

if (($filas) && (password_verify($pass, $buscar_pass['password']))) {
    $_SESSION['username'] = $usuario;
    header("location:../front/principal.php");
} else {
    header("location:../login.php");
    include "../login.php";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>