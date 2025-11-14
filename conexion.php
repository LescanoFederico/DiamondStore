<?php
$servername = "localhost";  
$username   = "root";       
$password   = "";            
$database   = "Diamond";   

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa a la BD";
?>
