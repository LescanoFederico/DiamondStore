<?php
include("conexion.php");

header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT id, nombre, precio, marca, imagen FROM productos";
$result = $conn->query($sql);

$productos = [];

while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos, JSON_UNESCAPED_UNICODE);
?>
