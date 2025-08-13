<?php
$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_DATABASE');
$port = getenv('DB_PORT'); 

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT nombres, apellidos, matricula, correo, grupo FROM grupo";
$result = $conn->query($sql);

echo "<h1>Alumnos registrados</h1>";
echo "<a href='index.php'>Volver al formulario</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>nombres</th><th>apellidos</th><th>matricula</th><th>Correo</th><th>grupo</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nombres']) . "</td>";
        echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
        echo "<td>" . htmlspecialchars($row['matricula']) . "</td>";
        echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['grupo']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros.";
}

$conn->close();
?>
