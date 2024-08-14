<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Iniciar la sesión para acceder a las variables de sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, devolver un error
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'No estás autorizado para ver esta página.']);
    exit();
}

// Obtener el ID del usuario logueado
$usuario_id = $_SESSION['user_id'];

// Inicializar una variable para almacenar los sueños
$sueños = [];

// Consultar los sueños del usuario actualmente logueado
$sql = "SELECT * FROM sueños WHERE usuario_id = :usuario_id ORDER BY fecha DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario_id' => $usuario_id]);
$sueños = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Manejar la inserción, actualización o eliminación de un sueño
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // Acciones: editar o eliminar
        $action = $_POST['action'];

        if ($action === 'edit') {
            $id = $_POST['id'];
            $contenido = $_POST['dream-content'];
            if (!empty(trim($contenido))) {
                // Asegurarse de que el sueño pertenece al usuario logueado
                $sql = "UPDATE sueños SET contenido = :contenido WHERE id = :id AND usuario_id = :usuario_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':contenido' => $contenido,
                    ':id' => $id,
                    ':usuario_id' => $usuario_id
                ]);
                echo json_encode(['status' => 'success']);
                exit();
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Contenido vacío']);
                exit();
            }
        } elseif ($action === 'delete') {
            $id = $_POST['id'];
            // Asegurarse de que el sueño pertenece al usuario logueado
            $sql = "DELETE FROM sueños WHERE id = :id AND usuario_id = :usuario_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':usuario_id' => $usuario_id
            ]);
            echo json_encode(['status' => 'success']);
            exit();
        }
    } else {
        // Insertar un nuevo sueño
        $contenido = $_POST['dream-content'];

        if (!empty(trim($contenido))) {
            $sql = "INSERT INTO sueños (contenido, usuario_id) VALUES (:contenido, :usuario_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':contenido' => $contenido,
                ':usuario_id' => $usuario_id
            ]);
            echo json_encode(['status' => 'success']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Contenido vacío']);
            exit();
        }
    }
}

// Devolver los sueños en formato JSON para la carga inicial
header('Content-Type: application/json');
echo json_encode($sueños);
?>
