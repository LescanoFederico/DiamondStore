<?php
include("conexion.php");
session_start();

header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['accion']) && $_GET['accion'] === 'comprar') {

    // RESTRICCIÓN
    if (!isset($_SESSION['user_id'])) {
        echo json_encode([
            "error" => true,
            "message" => "Debes iniciar sesión para realizar la compra."
        ]);
        exit;
    }
}

$sql = "SELECT id, nombre, precio, marca, imagen FROM productos";
$result = $conn->query($sql);

$productos = [];

while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos, JSON_UNESCAPED_UNICODE);
?>
