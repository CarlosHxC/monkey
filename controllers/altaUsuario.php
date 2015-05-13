<?php
require_once("conexion.php");

$correo;
$password;
$nombre;
$apellido;

$qry = "insert into ´usuario´ values(´".$correo."´, ´".$password."´,´".$nombre."´,´".$apellido."´);";
mysqli_query($conexion, $qry);
mysqli_close($conexion);

header("Location: index.php");

?>