<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$id = $_SESSION['Id'];

$sql = "SELECT tareas.ID, tareas.Nombre, tareas.Descripcion, tareas.Categoria, tareas.Estado, tareas.Usuario, categorias.Nombre AS 'nombre_categoria', estados.Nombre AS 'nombre_estado', usuarios.ID as 'user'
        FROM tareas 
        JOIN categorias ON tareas.Categoria = categorias.ID
        JOIN estados ON tareas.Estado = estados.ID
        JOIN usuarios ON tareas.Usuario= usuarios.ID
        WHERE usuarios.nombre='$username'";

$result = $conn->query($sql);

$categorias = $conn->query("SELECT * FROM categorias");
$estados = $conn->query("SELECT * FROM estados");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster Solutions</title>
    <link rel="shortcut icon" href="img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.ico"
        type="image/x-icon">
    <?php include ('table_header.html'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
   <?php
    include("./nav1.php");
   ?>

    <div class="tittle text-center my-3 me-3">
        <h2>Tus Tareas</h2>
    </div>

    <div class="modal fade" id="modalAdd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="modalAddAutor">Registrar una nueva tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="agregar_tarea.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <label for="Nombre" class="form-label">Nombre tarea:</label>
                            <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre de la tarea" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre de la tarea.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="Descripcion" class="form-label">Descripción de la tarea:</label>
                            <input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripción de la tarea" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese una descripción de la tarea.
                            </div>
                        </div>
                        <input type="hidden" name="Usuario" value="<?php echo $id ?>">
                        <div class="form-group mb-3">
                            <label for="Categoria" class="form-label">Selecciona la categoría con la que se
                                relaciona:</label>
                            <select name="Categoria" id="Categoria" class="form-select" required>
                                <option value="">Seleccione una categoría</option>
                                <?php
                                while ($fila = $categorias->fetch_assoc()) {
                                    echo "<option value='" . $fila['ID'] . "'>" . $fila['Nombre'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una categoría.
                            </div>
                        </div>
                        <input type="hidden" name="Estado" value="1">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>

                </div>
                <div class="modal-footer">Se añadirá la nueva tarea a tu lista 😱</div>
            </div>
        </div>
    </div>
    

    
    <div class="container mt-5">
        <button type="button" class="btn btn-info btn-md mb-4 p-2 rounded-5" data-bs-toggle="modal"
            data-bs-target="#modalAdd">
            <div class="d-flex align-items-center p-2">
                <div class="text-dark"><b>Añadir tarea</b></div>
            </div>
        </button>
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
                            <td class="color"><?php echo $row['nombre_categoria']; ?></td>
                            <td class="estado"><?php echo $row['nombre_estado']; ?></td>
                            <td class="color">
                                <div class="d-flex justify-content-center align-middle gap-2 p-4">

                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#editarModal<?php echo $row['ID']; ?>">
                                        <span class="material-icons mr-1">editar</span>
                                    </button>
        
                                    <div class="modal fade" id="editarModal<?php echo $row['ID']; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title" id="modalAddAutor">Editar tarea</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
        
                                                    <form action="update.php" class="needs-validation" method="POST" novalidate>
                                                        <div class="form mb-3">
                                                            <label for="Nombre" class="form-label">Nombre de la tarea:</label>
                                                            <input type="text" class="form-control mb-2" name="Nombre"
                                                                value="<?php echo $row['Nombre'] ?>"
                                                                placeholder="Nombre de la tarea" required>
                                                            <div class="invalid-feedback">
                                                                Por favor, ingrese un nombre para la tarea.
                                                            </div>
                                                            <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">
                                                            <input type="hidden" name="Usuario"
                                                                value="<?php echo $row['Usuario'] ?>">
        
                                                            <label for="Descripcion" class="form-label">Descripción de la
                                                                tarea:</label>
                                                            <input type="text" name="Descripcion" class="form-control mb-2"
                                                                placeholder="Descripcion" value="<?php echo $row['Descripcion'] ?>"
                                                                required>
        
                                                            <div class="invalid-feedback">
                                                                Por favor, ingrese un descripcion para la tarea.
                                                            </div>
                                                            <label for="Categoria_edit" class="form-label">Categoria</label>
                                                            <select name="Categoria" id="Categoria_edit" class="form-select mb-2" required>
                                                                <option value="">Seleccione una categoria</option>
                                                                <?php
                                                                // Iterar sobre las actividades y mostrarlas como opciones
                                                                foreach ($categorias as $Categoria) {
                                                                    $selected = ($Categoria['ID'] == $row['Categoria']) ? 'selected' : '';
                                                                    echo "<option value='{$Categoria['ID']}' {$selected}>{$Categoria['Nombre']}</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Por favor, seleccione una categoria.
                                                            </div>
                                                            <label for="Estado" class="form-label">Estado:</label>
                                                            <select name="Estado" id="Estado" class="form-select" required>
                                                                <option value="">Seleccione un estado</option>
                                                                <?php
                                                                // Iterar sobre las actividades y mostrarlas como opciones
                                                                foreach ($estados as $Estado) {
                                                                    $selected = ($Estado['ID'] == $row['Estado']) ? 'selected' : '';
                                                                    echo "<option value='{$Estado['ID']}' {$selected}>{$Estado['Nombre']}</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Por favor, seleccione un estado.
                                                            </div>
        
                                                        </div>
        
                                                        <div class="gap-2">
                                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </form>
        
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                    <a class="btn btn-danger link-light" href="borrar_tarea.php?ID=<?php echo $row['ID'] ?>">
                                        <span class="fas fa-clipboard-list">Eliminar</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include ('table_script.html'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function cambiarColorCelda() {
            const estados = document.querySelectorAll(".estado");
            estados.forEach(celda => {
                const texto = celda.textContent.trim();
                const fila = celda.closest("tr");
                const colores = fila.querySelectorAll(".color");
                switch (texto) {
                    case "Pendiente":
                        celda.style.backgroundColor = "Gainsboro";
                        colores.forEach(celda => {
                            celda.style.backgroundColor = "Gainsboro";
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