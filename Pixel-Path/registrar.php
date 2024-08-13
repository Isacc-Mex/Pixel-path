<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Obtener datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$contrasena = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validar las contraseñas
if ($contrasena !== $confirm_password) {
    echo '<script>alert("Las contraseñas no coinciden."); window.location.href="registro.html";</script>';
    exit();
}


// Validar si el correo electrónico o el nombre de usuario ya existen
$sql = "SELECT * FROM usuarios WHERE email = :email OR username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':email' => $email,
    ':username' => $username
]);

if ($stmt->rowCount() > 0) {
    echo '<script>alert("El correo electrónico o el nombre de usuario ya están en uso."); window.location.href="registro.html";</script>';
    exit();
}

// Hash de la contraseña antes de almacenarla
$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (name, email, username, contrasena) VALUES (:name, :email, :username, :contrasena)";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([
    ':name' => $name,
    ':email' => $email,
    ':username' => $username,
    ':contrasena' => $contrasena_hash
]);

if ($result) {
    // Redirigir a una página de éxito o mostrar un mensaje
    echo '<script>alert("Registro exitoso. Puedes iniciar sesión."); window.location.href="borrador.html";</script>';
} else {
    // Mostrar mensaje de error si algo salió mal
    echo '<script>alert("Hubo un problema al registrar tu cuenta. Por favor, intenta de nuevo."); window.location.href="registro.html";</script>';
}
?>
