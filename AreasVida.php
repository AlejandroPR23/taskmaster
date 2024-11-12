<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$id = $_SESSION['Id'];


// Construye la consulta SQL base
$sql = "SELECT * FROM areas";

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
        <h2>Areas / Proyectos de Mi Vida</h2>
    </div>

    <div class="modal fade" id="modalAdd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="modalAddAutor">Registrar una nueva area o proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="./agregar_area.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <input type="hidden" name="Usuario" value="<?php echo $id ?>">
                            <label for="Nombre" class="form-label">Nombre area / proyecto:</label>
                            <input type="text" name="Nombre" class="form-control" id="Nombre"
                                placeholder="Nombre del area / proyecto" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre del area / proyecto.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>

                </div>
                <div class="modal-footer">Se añadirá la nueva area / proyecto a tu lista 😱</div>
            </div>
        </div>
    </div>



    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4 gap-2 flex-wrap">
            <div class="mb-2">
                <button type="button" class="btn btn-info btn-md p-2 rounded-5" data-bs-toggle="modal"
                    data-bs-target="#modalAdd">
                    <div class="d-flex align-items-center p-2">
                        <div class="text-dark"><b>Añadir Area / proyecto</b></div>
                    </div>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table id="nueva_tabla1" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Nombre del area / proyecto</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center align-middle gap-2 p-4">

                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#editarModal<?php echo $row['ID']; ?>">
                                        <span><i class="fa-solid fa-pen-to-square text-light"></i></span>
                                    </button>

                                    <div class="modal fade" id="editarModal<?php echo $row['ID']; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title" id="modalAddAutor">Editar area / proyecto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="update_area.php" class="needs-validation" method="POST"
                                                        novalidate>
                                                        <div class="form mb-3">
                                                            <label for="Nombre" class="form-label">Nombre area / proyecto:</label>
                                                            <input type="text" class="form-control mb-3" name="Nombre"
                                                                value="<?php echo $row['Nombre'] ?>"
                                                                placeholder="Nombre del area / proyecto" required>
                                                            <div class="invalid-feedback">
                                                                Por favor, ingrese un nombre para el area o proyecto.
                                                            </div>
                                                            <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">
                                                            <input type="hidden" name="Usuario"
                                                                value="<?php echo $row['Usuario'] ?>">
                                                        <div class="gap-2">
                                                            <button type="submit"
                                                                class="btn btn-primary">Actualizar</button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <a class="btn btn-danger link-light"
                                    href="borrar_area.php?ID=<?php echo $row['ID'] ?>">
                                    <span><i class="fa-solid fa-trash"></i></span>
                                </a>
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