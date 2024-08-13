<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Iniciar sesión y verificar si el usuario está autenticado
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: borrador.html'); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

// Obtener el nombre de usuario del usuario autenticado
$username = $_SESSION['username'];

// Obtener datos del formulario
$new_username = $_POST['username'];
$new_email = $_POST['email'];
$new_password = $_POST['password'];

// Verificar si se desea actualizar la contraseña
if (!empty($new_password)) {
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET username = :username, email = :email, contrasena = :contrasena WHERE username = :old_username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $new_username,
        ':email' => $new_email,
        ':contrasena' => $new_password_hash,
        ':old_username' => $username
    ]);
} else {
    $sql = "UPDATE usuarios SET username = :username, email = :email WHERE username = :old_username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $new_username,
        ':email' => $new_email,
        ':old_username' => $username
    ]);
}

// Actualizar el nombre de usuario en la sesión si se ha cambiado
if ($new_username !== $username) {
    $_SESSION['username'] = $new_username;
}

// Redirigir a la página de perfil con un mensaje de éxito
header('Location: mi_perfil.html?success=1');
exit();
?>
