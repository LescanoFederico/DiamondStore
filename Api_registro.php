<?php
include("conexion.php");
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents("php://input"), true);

$nombre = $data["nombre"];
$apellido = $data["apellido"];
$correo = $data["correo"];
$contraseña = password_hash($data["contraseña"], PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña)
        VALUES ('$nombre', '$apellido', '$correo', '$contraseña')";

if ($conn->query($sql)) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["status" => "error", "msg" => $conn->error]);
}
?>
