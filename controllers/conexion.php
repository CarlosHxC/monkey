<?php
$_server = "localhost";
$_user = "root";
$_pass = "";
$_db = "monkey";

$conexion = mysqli_connect($_server, $_user, $_pass)
    or die("Error");

mysqli_select_db($_db, $conexion);
?>