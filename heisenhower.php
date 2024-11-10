<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz de Administración del Tiempo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<?php
include("./nav1.php");
?>

<div class="container mt-5">
    <h2>Matriz de Administración del Tiempo</h2>
    <form id="matrizForm" action="" method="POST">
        <div class="mb-3">
            <label for="area" class="form-label">Elige el área o proyecto:</label>
            <select class="form-select" id="area" name="area" required>
                <option value="">Seleccione un área</option>
                <option value="Laboral">Laboral</option>
                <option value="Estudio">Estudio</option>
                <option value="Creatividad">Creatividad</option>
                <option value="Personal">Personal</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cuadrante" class="form-label">Selecciona el cuadrante:</label>
            <select class="form-select" id="cuadrante" name="cuadrante" required>
                <option value="">Selecciona un cuadrante</option>
                <option value="Urgente e Importante">Urgente e Importante</option>
                <option value="No Urgente pero Importante">No Urgente pero Importante</option>
                <option value="Urgente pero No Importante">Urgente pero No Importante</option>
                <option value="No Urgente y No Importante">No Urgente y No Importante</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tarea" class="form-label">Ingresa una tarea:</label>
            <input type="text" class="form-control" id="tarea" name="tarea" placeholder="Ingresa una tarea" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Tarea</button>
    </form>

    <hr>

    <!-- Tabla para mostrar las tareas organizadas -->
    <h4>Tareas organizadas</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Urgente e Importante</th>
                <th>No Urgente pero Importante</th>
                <th>Urgente pero No Importante</th>
                <th>No Urgente y No Importante</th>
            </tr>
        </thead>
        <tbody id="tablaTareas">
            <!-- Aquí se añadirán las tareas dinámicamente -->
        </tbody>
    </table>
</div>

<script>
    // Crear un objeto para almacenar las tareas por cuadrante
    let tareasPorCuadrante = {
        "Urgente e Importante": [],
        "No Urgente pero Importante": [],
        "Urgente pero No Importante": [],
        "No Urgente y No Importante": []
    };

    // Evento al enviar el formulario
    $('#matrizForm').on('submit', function(e) {
        e.preventDefault();

        // Obtener los valores del formulario
        let area = $('#area').val();
        let cuadrante = $('#cuadrante').val();
        let tarea = $('#tarea').val();

        // Verificar que todos los campos estén llenos
        if (area && cuadrante && tarea) {
            // Añadir la tarea al cuadrante correspondiente
            tareasPorCuadrante[cuadrante].push(tarea);

            // Limpiar el campo de tarea
            $('#tarea').val('');

            // Actualizar la tabla con las tareas
            actualizarTabla();
        } else {
            alert('Por favor, complete todos los campos.');
        }
    });

    // Función para actualizar la tabla con las tareas
    function actualizarTabla() {
        let tablaTareas = $('#tablaTareas');
        tablaTareas.empty();

        // Crear filas para los cuadrantes
        let fila = '<tr>';

        // Crear columnas con las tareas de cada cuadrante
        for (let cuadrante in tareasPorCuadrante) {
            fila += '<td><ul>';
            tareasPorCuadrante[cuadrante].forEach(function(tarea) {
                fila += '<li>' + tarea + '</li>';
            });
            fila += '</ul></td>';
        }

        fila += '</tr>';
        tablaTareas.append(fila);
    }
</script>

</body>
</html>
