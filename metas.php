<?php
session_start();
include 'db.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['Id']; // El ID del usuario logueado

// Obtener todas las áreas del usuario
$areasQuery = "SELECT * FROM areas WHERE Usuario = '$usuario_id'";
$areasResult = mysqli_query($conn, $areasQuery);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Áreas de Mi Vida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <?php 
    include("./nav1.php");
    ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Mis Áreas y Metas</h2>

        <div class="card">
            <div class="card-header bg-info text-white text-center">
                Áreas y Metas Asignadas
            </div>
            <div class="card-body">
                <?php
                if (mysqli_num_rows($areasResult) > 0) {
                    while ($area = mysqli_fetch_assoc($areasResult)) {
                        $area_id = $area['ID'];
                        echo "<h4>" . $area['Nombre'] . "</h4>";

                        // Obtener las metas asociadas a esta área
                        $metasQuery = "SELECT * FROM metas WHERE usuario_id = '$usuario_id' AND area_id = '$area_id'";
                        $metasResult = mysqli_query($conn, $metasQuery);

                        if (mysqli_num_rows($metasResult) > 0) {
                            echo "<ul class='list-group'>";
                            while ($meta = mysqli_fetch_assoc($metasResult)) {
                                echo "<li class='list-group-item'>
                                    <strong>Meta:</strong> " . $meta['descripcion'] . "<br>
                                    <strong>Tiempo Estimado:</strong> " . $meta['tiempo_estimado'] . "<br>
                                    <a href='editar_meta.php?id=" . $meta['id'] . "' class='btn btn-warning btn-sm mt-2'>Editar</a>
                                    <a href='eliminar_meta.php?id=" . $meta['id'] . "' class='btn btn-danger btn-sm mt-2'>Eliminar</a>
                                  </li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "<p>No hay metas asignadas para esta área.</p>";
                        }
                    }
                } else {
                    echo "<p>No tienes áreas asignadas.</p>";
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>
