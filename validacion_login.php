<?php
require_once('conexion.php');
session_start();

$user = $_POST["usuario"];
$clave = $_POST["clave"];

// Verificar si el usuario existe
$sql = "SELECT id_usuario, nombre, usuario, clave FROM usuarios WHERE usuario = '$user'";
$result = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($result);

if (!$fila) {
    echo "<script text='text/javascript'>
        alert('Usuario No registrado');
        window.location = 'index.php';
    </script>";
} else {
    // Verificar la clave
    $hashed_password = $fila['clave']; // Obtener la clave encriptada de la base de datos

    if (password_verify($clave, $hashed_password)) {
        // Clave correcta, iniciar sesión
        $_SESSION["user"] = $fila['usuario'];
        $_SESSION["id_usuario"] = $fila['id_usuario'];
        $_SESSION["nombre"] = $fila['nombre'];
        
        header("Location: cliente.php");
    } else {
        echo "<script text='text/javascript'>
            alert('Clave incorrecta');
            window.location = 'index.php';
        </script>";
    }
}
?>