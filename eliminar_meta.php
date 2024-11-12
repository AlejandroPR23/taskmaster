<?php
session_start();
include 'db.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['Id']; // El ID del usuario logueado
$meta_id = $_GET['id']; // Obtener el ID de la meta desde la URL

// Eliminar la meta de la base de datos
$deleteQuery = "DELETE FROM metas WHERE id = '$meta_id' AND usuario_id = '$usuario_id'";

if (mysqli_query($conn, $deleteQuery)) {
    header("Location: ./metas.php");
    exit();
} else {
    echo "Error al eliminar la meta: " . mysqli_error($conn);
}
?>
