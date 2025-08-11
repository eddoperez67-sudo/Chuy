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

$sql = "SELECT nombre, apellido, matricula, correo, grupo FROM grupo";
$result = $conn->query($sql);

echo "<h1>Alumnos registrados</h1>";
echo "<a href='index.htm'>Volver al formulario</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Matrícula</th><th>Correo</th><th>Grupo</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['apellido']) . "</td>";
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
