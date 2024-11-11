<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$id = $_SESSION['Id'];

// Verifica si hay una categoría seleccionada
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Construye la consulta SQL base
$sql = "SELECT tareas.ID, tareas.Nombre, tareas.Descripcion, tareas.Categoria, tareas.Estado, tareas.Usuario, 
        categorias.Nombre AS 'nombre_categoria', estados.Nombre AS 'nombre_estado', usuarios.ID as 'user'
        FROM tareas 
        JOIN categorias ON tareas.Categoria = categorias.ID
        JOIN estados ON tareas.Estado = estados.ID
        JOIN usuarios ON tareas.Usuario = usuarios.ID
        WHERE usuarios.nombre='$username' AND tareas.Estado = 3";

// Añade una cláusula de filtro si hay una categoría seleccionada
if ($categoriaSeleccionada) {
    $sql .= " AND categorias.Nombre = '$categoriaSeleccionada'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster Solutions</title>
    <link rel="shortcut icon" href="img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.ico"
        type="image/x-icon">
    <?php include('table_header.html'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-light">
    <?php
    include("./nav1.php");
    ?>

    <div class="tittle text-center my-3 me-3">
        <h2>Tus Tareas Completadas</h2>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-4 gap-2">
            <div>
                <button onclick="filtrarTareas('')" class="btn btn-info btn-md p-3 rounded-4">Todas</button>
                <button onclick="filtrarTareas('Personal')" class="btn btn-info btn-md p-3 rounded-4">Personal</button>
                <button onclick="filtrarTareas('Trabajo')" class="btn btn-info btn-md p-3 rounded-4">Trabajo</button>
                <button onclick="filtrarTareas('Estudio')" class="btn btn-info btn-md p-3 rounded-4">Estudio</button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="nueva_tabla" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre de la Tarea</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td class="color"><?php echo $row['Nombre']; ?></td>
                            <td class="color"><?php echo $row['Descripcion']; ?></td>
                            <td class="color text-center"><?php echo $row['nombre_categoria']; ?></td>
                            <td class="estado text-center"><?php echo "<span class='badge text-bg-secondary bg-success'>{$row['nombre_estado']}</span>";?></td>
                            <td class="color">
                                <div class="d-flex justify-content-center align-middle gap-2 p-4">
                                    <a class="btn btn-danger link-light"
                                        href="borrar_tarea1.php?ID=<?php echo $row['ID'] ?>">
                                        <span><i class="fa-solid fa-trash"></i></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('table_script.html'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function filtrarTareas(categoria) {
            // Redirige a la misma página pero con un parámetro de categoría en la URL
            window.location.href = `?categoria=${categoria}`;
        }
    </script>

    <script>
        function cambiarColorCelda() {
            const estados = document.querySelectorAll(".estado");
            estados.forEach(celda => {
                const texto = celda.textContent.trim();
                const fila = celda.closest("tr");
                const colores = fila.querySelectorAll(".color");
                switch (texto) {
                    case "Pendiente":
                        celda.style.backgroundColor = "#FFE0B2";
                        colores.forEach(celda => {
                            celda.style.backgroundColor = "#FFE0B2";
                        });
                        break;
                    case "En progreso":
                        celda.style.backgroundColor = "#B0E0E6";
                        colores.forEach(celda => {
                            celda.style.backgroundColor = "#B0E0E6";
                        });
                        break;
                    case "Completada":
                        celda.style.backgroundColor = "#8FBC8B";
                        colores.forEach(celda => {
                            celda.style.backgroundColor = "#8FBC8B";
                        });
                        break;
                    default:
                        celda.style.backgroundColor = "white";
                        break;
                }
            })
        }

        window.onload = cambiarColorCelda;
    </script>

    <script>
        // Ejemplo de JavaScript para la validación de formularios
        (function () {
            'use strict'

            // Obtener todos los formularios a los que queremos aplicar estilos de validación personalizados de Bootstrap
            var forms = document.querySelectorAll('.needs-validation')

            // Bucle sobre ellos y evitar el envío
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

</body>

</html>