<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: borrador.html'); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

// Obtener el nombre de usuario del usuario autenticado
$username = $_SESSION['username'];

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Consultar los datos del usuario
$sql = "SELECT * FROM usuarios WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo 'Usuario no encontrado.';
    exit();
}

// Convertir los datos a JSON y redirigir a la página HTML
header('Content-Type: application/json');
echo json_encode($user);
?>
