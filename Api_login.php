<?php
include("conexion.php");
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents("php://input"), true);

$correo = $data["correo"];
$contraseña = $data["contraseña"];

$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo json_encode(["status" => "error", "msg" => "Usuario no encontrado"]);
    exit;
}

$user = $result->fetch_assoc();

if (password_verify($contraseña, $user["contraseña"])) {
    echo json_encode(["status" => "ok", "msg" => "Acceso permitido"]);
} else {
    echo json_encode(["status" => "error", "msg" => "Contraseña incorrecta"]);
}
?>
