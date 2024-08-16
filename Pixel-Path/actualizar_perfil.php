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
$old_username = $_SESSION['username'];
$usuario_id = $_SESSION['user_id']; 
// Obtener datos del formulario
$new_username = $_POST['username'];
$new_email = $_POST['email'];
$new_password = $_POST['password'];

// Inicializar variables para la foto de perfil
$foto_perfil_ruta = null;

if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
    $archivo = $_FILES['foto_perfil'];
    $foto_perfil_ruta = 'uploads/' . basename($archivo['name']);

    if (move_uploaded_file($archivo['tmp_name'], $foto_perfil_ruta)) {
        // Foto de perfil subida correctamente
    } else {
        echo '<script>alert("Error al mover el archivo de la foto de perfil."); window.location.href="perfil.php";</script>';
        exit();
    }
}

// Verificar si se desea actualizar la contraseña
if (!empty($new_password)) {
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET username = :username, email = :email, contrasena = :contrasena" . ($foto_perfil_ruta ? ", foto_perfil = :foto_perfil" : "") . " WHERE username = :old_username";
    $params = [
        ':username' => $new_username,
        ':email' => $new_email,
        ':contrasena' => $new_password_hash,
        ':old_username' => $old_username
    ];
    if ($foto_perfil_ruta) {
        $params[':foto_perfil'] = $foto_perfil_ruta;
    }
} else {
    $sql = "UPDATE usuarios SET username = :username, email = :email" . ($foto_perfil_ruta ? ", foto_perfil = :foto_perfil" : "") . " WHERE username = :old_username";
    $params = [
        ':username' => $new_username,
        ':email' => $new_email,
        ':old_username' => $old_username
    ];
    if ($foto_perfil_ruta) {
        $params[':foto_perfil'] = $foto_perfil_ruta;
    }
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

// Actualizar el nombre de usuario en la sesión si cambió
if ($new_username !== $old_username) {
    $_SESSION['username'] = $new_username;
}

echo '<script>alert("Perfil actualizado exitosamente."); window.location.href="mi_perfil.html";</script>';
?>
