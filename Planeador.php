<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planeador de Semana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>

    <?php
    include('./nav1.php');
    ?>
<div class="container mt-5">
    <h2>Planeador de Semana</h2>

    <!-- Formulario para agregar tarea -->
    <form id="planeadorForm">
        <div class="mb-3">
            <label for="dia" class="form-label">Selecciona el día:</label>
            <select class="form-select" id="dia" name="dia" required>
                <option value="">Selecciona un día</option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tarea" class="form-label">Tarea:</label>
            <input type="text" class="form-control" id="tarea" name="tarea" placeholder="Ingresa una tarea" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Tarea</button>
    </form>

    <hr>

    <!-- Tabla con los días de la semana -->
    <h4>Planea tu semana</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody id="tablaSemana">
            <tr>
                <td><ul id="lunes"></ul></td>
                <td><ul id="martes"></ul></td>
                <td><ul id="miercoles"></ul></td>
                <td><ul id="jueves"></ul></td>
                <td><ul id="viernes"></ul></td>
                <td><ul id="sabado"></ul></td>
                <td><ul id="domingo"></ul></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    // Crear un objeto para almacenar las tareas de cada día de la semana
    let tareasPorDia = {
        "Lunes": [],
        "Martes": [],
        "Miércoles": [],
        "Jueves": [],
        "Viernes": [],
        "Sábado": [],
        "Domingo": []
    };

    // Evento al enviar el formulario
    $('#planeadorForm').on('submit', function(e) {
        e.preventDefault();

        // Obtener los valores del formulario
        let dia = $('#dia').val();
        let tarea = $('#tarea').val();

        // Verificar que todos los campos estén llenos
        if (dia && tarea) {
            // Añadir la tarea al día correspondiente
            tareasPorDia[dia].push(tarea);

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
        // Limpiar el contenido actual de las listas
        for (let dia in tareasPorDia) {
            $('#' + dia.toLowerCase()).empty();

            // Crear una lista de tareas para cada día
            tareasPorDia[dia].forEach(function(tarea) {
                $('#' + dia.toLowerCase()).append('<li>' + tarea + '</li>');
            });
        }
    }
</script>

</body>
</html>
