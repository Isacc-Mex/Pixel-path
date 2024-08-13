<?php
// conexion.php

// Configuración de la base de datos
$host = 'localhost'; // Cambia esto si es necesario
$dbname = 'mi_base_de_datos';
$user = 'root'; // Cambia esto según tu configuración
$pass = ''; // Cambia esto según tu configuración

try {
    // Crear una nueva conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Configurar el modo de error para excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejar errores de conexión
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
?>

