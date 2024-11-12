<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$id = $_SESSION['Id'];

$areas = $conn->query("SELECT * FROM areas");
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
        <h2 class="text-center mb-4">Mapa de Áreas de Mi Vida</h2>

        <div class="card">
            <div class="card-header bg-info text-white text-center">
                Elige un área de tu vida y escribe tus metas
            </div>
            <div class="card-body">
                <form id="formMetas" method="POST" action="guardar_metas.php">
                    <div class="mb-3">
                        <label for="area" class="form-label">Selecciona un área de tu vida:</label>
                        <select id="area" name="area" class="form-select" required>
                            <option value="">Seleccionar área</option>
                            <?php
                            while ($fila = $areas->fetch_assoc()) {
                                echo "<option value='" . $fila['ID'] . "'>" . $fila['Nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Formulario de metas dinámico -->
                    <div id="metasSection"></div>

                    <button type="button" id="addMetaBtn" class="btn btn-secondary mt-3">Agregar otra meta</button>
                    <button type="submit" class="btn btn-primary mt-3">Guardar Metas</button>
                </form>
            </div>
        </div>

        <div class="mt-5">
            <h4>Mis Áreas y Metas</h4>
            <a class="btn btn-danger link-light" href="./metas.php">
                Ver mis metas por area
            </a>
        </div>
    </div>

    <script>
        document.getElementById('area').addEventListener('change', function () {
            const areaId = this.value;
            const metasSection = document.getElementById('metasSection');
            metasSection.innerHTML = ''; // Limpiar los campos existentes antes de mostrar los nuevos

            if (areaId) {
                for (let i = 0; i < 3; i++) {
                    metasSection.innerHTML += `
                        <div class="mb-3 meta">
                            <label for="meta${i}" class="form-label">Meta ${i + 1}:</label>
                            <input type="text" name="meta${i}[]" id="meta${i}" class="form-control" placeholder="Descripción de la meta" required>
                            <label for="tiempo${i}" class="form-label">Tiempo estimado:</label>
                            <input type="text" name="tiempo${i}[]" id="tiempo${i}" class="form-control" placeholder="Tiempo estimado" required>
                        </div>
                    `;
                }
            }
        });

        // Agregar más campos para metas
        document.getElementById('addMetaBtn').addEventListener('click', function () {
            const metasSection = document.getElementById('metasSection');
            metasSection.innerHTML += `
                <div class="mb-3 meta">
                    <label for="metaExtra" class="form-label">Nueva Meta:</label>
                    <input type="text" name="metaExtra[]" class="form-control" placeholder="Descripción de la nueva meta" required>
                    <label for="tiempoExtra" class="form-label">Nuevo Tiempo estimado:</label>
                    <input type="text" name="tiempoExtra[]" class="form-control" placeholder="Tiempo estimado de la nueva meta" required>
                </div>
            `;
        });
    </script>
</body>

</html>