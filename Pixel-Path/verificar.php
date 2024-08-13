<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Iniciar sesión
session_start();

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar la base de datos
$sql = "SELECT * FROM usuarios WHERE username = :username"; // Asegúrate de que 'username' es el nombre correcto de la columna
$stmt = $pdo->prepare($sql);

// Ejecutar la consulta con parámetros
$stmt->execute([':username' => $username]);

// Verificar si el usuario existe
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['contrasena'])) {
    // Usuario encontrado y contraseña verificada, redirigir a welcome.html
// PHP: Redirigir con el parámetro username
header('Location: welcome.html?username=' . urlencode($username));

    exit(); // Asegúrate de detener la ejecución del script después de redirigir
} else {
    // Usuario no encontrado o contraseña incorrecta, mostrar mensaje de error
    echo '<script>alert("Usuario o contraseña incorrectos"); window.location.href="borrador.html";</script>';
}
?>
