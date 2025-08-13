<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Universidad Tecnológica de Santa Catarina</title>
</head>
<body>
    <h1>Universidad Tecnológica de Santa Catarina</h1>

    <form action="guardar.php" method="post">
        <label>Nombres:</label><br />
        <input type="text" name="nombres" maxlength="50" required /><br />

        <label>Apellidos:</label><br />
        <input type="text" name="apellidos" maxlength="50" required /><br />

        <label>Matrícula:</label><br />
        <input type="text" name="matricula" maxlength="50" required /><br />

        <label>Correo:</label><br />
        <input type="email" name="correo" maxlength="50" required /><br />

        <label>Grupo:</label><br />
        <input type="text" name="grupo" maxlength="50" required /><br /><br />

        <input type="submit" value="Guardar" />
    </form>

    <br />
    <a href="verregistrado.php">Ver registrados</a>
</body>
</html>


