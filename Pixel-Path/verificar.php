<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Iniciar sesión
session_start();

// Obtener y sanitizar datos del formulario
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Consultar la base de datos
$sql = "SELECT * FROM usuarios WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $username]);

// Verificar si el usuario existe
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['contrasena'])) {
    // Usuario encontrado y contraseña verificada
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user['id']; // Almacenar el ID del usuario para futuras consultas

    // Redirigir a la página de bienvenida con el nombre de usuario como parámetro
    header('Location: welcome.html?username=' . urlencode($username));
    exit();
} else {
    // Usuario no encontrado o contraseña incorrecta
    echo '<script>alert("Usuario o contraseña incorrectos"); window.location.href="borrador.html";</script>';
}
?>
