<?php
$servername = getenv('DB_HOST');
$username   = getenv('DB_USER');
$password   = getenv('DB_PASSWORD');
$dbname     = getenv('DB_DATABASE');
$port       = getenv('DB_PORT');

// Verifica que las variables tienen valor
if (!$servername || !$username || !$password || !$dbname || !$port) {
    die("Error: Variables de entorno no definidas");
}

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre    = $_POST['nombres'];
$apellido  = $_POST['apellidos'];
$matricula = $_POST['matricula'];
$correo    = $_POST['correo'];
$grupo     = $_POST['grupo'];

// Insertar en la tabla
$sql = "INSERT INTO grupo (nombres, apellidos, matricula, correo, grupo) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $apellido, $matricula, $correo, $grupo);

if ($stmt->execute()) {
    echo "Registro guardado correctamente.<br><a href='index.htm'>Volver</a>";
} else {
    echo "Error: " . $stmt->error . "<br><a href='index.htm'>Volver</a>";
}

$stmt->close();
$conn->close();
?>
