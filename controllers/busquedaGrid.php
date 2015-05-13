<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once("conexion.php");

$ciudadSearch;
$calleSearch;
$coloniaSearch;

$qry = "select ´idEmpresa´ from ´sucursal´ where ´coloniaSuc´ ='".$userColonia."';)";
$res = mysqli_query($conexion, $qry);

$qry = "select * from ´empresa´ where ´idEmpresa´ ='".res["idEmpresa"].';';
$res2 = mysqli_query($conexion, $qry);

$gridEst = "";
while($row = mysqli_fetch_assoc($res2)) {
    if($gridEst != "") {$gridEst .= ",";}
    $gridEst .= '{"Nombre":"'.$row["nombre"].'",';
    $gridEst .= '"Tipo":"'.$row["tipo"].'",';
    $gridEst .= '"Url":"'.$row["urlLogo"].'",';
    $gridEst .= '"CostoMin":"'.$row["costoMin"].'",';
    $gridEst .= '"TiempoAprox":"'.$row["tiempoAprox"].'"}';
}

$output = '{"Results":['.$gridEst.']}';
mysqli_close($conexion);
echo $output;
?>