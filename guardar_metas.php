<?php
session_start();
include 'db.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['Id']; // El ID del usuario que está logueado
$area_id = $_POST['area']; // El ID del área seleccionada

// Validar si se ha seleccionado un área
if (empty($area_id)) {
    die('No se ha seleccionado un área.');
}

// Verificar si hay metas enviadas
$metas = [];
$tiempos = [];

// Guardar metas y tiempos estimados
for ($i = 0; $i < 3; $i++) {
    if (isset($_POST['meta'.$i]) && isset($_POST['tiempo'.$i])) {
        $metas[] = $_POST['meta'.$i][0]; // Descripción de la meta
        $tiempos[] = $_POST['tiempo'.$i][0]; // Tiempo estimado
    }
}

// Agregar metas adicionales si se añadieron dinámicamente
if (isset($_POST['metaExtra']) && isset($_POST['tiempoExtra'])) {
    foreach ($_POST['metaExtra'] as $index => $meta) {
        $metas[] = $meta;
        $tiempos[] = $_POST['tiempoExtra'][$index];
    }
}

// Guardar metas en la base de datos
foreach ($metas as $index => $meta) {
    $descripcion = mysqli_real_escape_string($conn, $meta); // Sanitarización de la entrada
    $tiempo_estimado = mysqli_real_escape_string($conn, $tiempos[$index]); // Sanitarización de la entrada

    // Insertar meta en la base de datos
    $sql = "INSERT INTO metas (usuario_id, area_id, descripcion, tiempo_estimado) 
            VALUES ('$usuario_id', '$area_id', '$descripcion', '$tiempo_estimado')";
    
    if (!mysqli_query($conn, $sql)) {
        die('Error al guardar la meta: ' . mysqli_error($conn));
    }
}

// Redirigir a una página de confirmación o donde desees después de guardar
header("Location: ./MapasVida.php");
exit();
?>
