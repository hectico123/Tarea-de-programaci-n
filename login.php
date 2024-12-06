<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="validar_login.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="clave">Clave:</label>
        <input type="password" name="clave" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>