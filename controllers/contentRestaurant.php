<?php
require_once("conexion.php");

$idEmpresa;
$idSuc;

$qry = "select * ´empresa´ where idEmpresa ='".$idEmpresa."';";
$res = mysqli_query($conexion, $qry);

$contentRest = "";
while($row = mysqli_fetch_assoc($res)) {
    if($contentRest != "") {$contentRest .= ",";}
    $contentRest .= '{"Nombre":"'.$row["nombre"].'",';
    $contentRest .= '"Tipo":"'.$row["tipo"].'",';
    $contentRest .= '"Url":"'.$row["urlLogo"].'"}';
}

$output = '{"Empresa": { "Datos": ['.$contentRest.'] },';

$qry = "select * ´menu´ where idEmpresa ='".$idEmpresa."';";
$res = mysqli_query($conexion, $qry);

$contentMenu = "";
while($row = mysqli_fetch_assoc($res)) {
    if($contentMenu != "") {$contentMenu .= ",";}
    $contentMenu .= '{"Seccion":"'.$row["seccionMenu"].'",';
    $contentMenu .= '"NombreProducto":"'.$row["nombreProducto"].'",';
    $contentMenu .= '"DescProducto":"'.$row["descProducto"].'",';
    $contentMenu .= '"Precio":"'.$row["precio"].'",';
    $contentMenu .= '"Activo":"'.$row["estadoActivo"].'",';
    $contentMenu .= '"Promo":"'.$row["estadoPromo"].'"}';
}

$output .= '{"Menu": ['.$contentMenu.'] },';

$qry = "select * from ´comentario´ where idEmpresa = '".$idEmpresa."';";
$res = mysqli_query($conexion, $qry);

$contentCom = "";
while($row = mysqli_fetch_assoc($res)) {
    if($contentCom != "") {$contentCom .= ",";}
    $contentCom .= '{"E.Anonimo":'.row["anonimo"].'",';
    $contentCom .= '"Fecha":'.row["fechaComen"].'",';
    $contentCom .= '"Comentario":'.row["comentario"].'",';
    $contentCom .= '"Calificacion":'.row["calificacion"].'",';
    $contentCom .= '"UrlFoto":'.row["urlFoto"].'"}';
}

$output .= '{"Comentarios": ['.$contentCom.'] } }';
?>