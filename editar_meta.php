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

// Obtener los datos de la meta
$query = "SELECT * FROM metas WHERE id = '$meta_id' AND usuario_id = '$usuario_id'";
$result = mysqli_query($conn, $query);
$meta = mysqli_fetch_assoc($result);

if (!$meta) {
    echo "Meta no encontrada.";
    exit();
}

// Procesar la edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $tiempo_estimado = $_POST['tiempo_estimado'];

    $updateQuery = "UPDATE metas SET descripcion = '$descripcion', tiempo_estimado = '$tiempo_estimado' WHERE id = '$meta_id' AND usuario_id = '$usuario_id'";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: ./metas.php");
        exit();
    } else {
        echo "Error al actualizar la meta: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Meta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <?php include("./nav1.php"); ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Editar Meta</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción de la meta:</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $meta['descripcion']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tiempo_estimado" class="form-label">Tiempo estimado:</label>
                        <input type="text" id="tiempo_estimado" name="tiempo_estimado" class="form-control" value="<?php echo $meta['tiempo_estimado']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
