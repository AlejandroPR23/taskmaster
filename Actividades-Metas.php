<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades para Mis Metas - TaskMaster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<?php
include("./nav1.php");
?>

<div class="container mt-5">
    <h2>Actividades para Mis Metas</h2>
    <form action="procesar_actividades.php" method="POST">
        <div class="mb-3">
            <label for="area" class="form-label">Selecciona el Área:</label>
            <select class="form-select" id="area" name="area" required>
                <option value="">Seleccione un área</option>
                <option value="Laboral">Laboral</option>
                <option value="Estudio">Estudio</option>
                <option value="Creatividad">Creatividad</option>
                <option value="Personal">Personal</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="metas" class="form-label">Selecciona la Meta:</label>
            <select class="form-select" id="metas" name="metas" required>
                <option value="">Selecciona una meta</option>
                <!-- Las metas se llenarán dinámicamente con JavaScript -->
            </select>
        </div>

        <div class="mb-3" id="actividades">
            <!-- Aquí se mostrarán los campos de actividades -->
        </div>

        <button type="submit" class="btn btn-primary">Guardar Actividades</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const metas = {
        "Laboral": [
            "Completar todas las tareas que me sean asignadas",
            "Mejorar mi comunicación con mi grupo laboral",
            "Conseguir quedarme trabajando en la empresa luego de terminar mis practicas"
        ],
        "Estudio": [
            "Aprender ingles de una vez por todas",
            "Terminar de aprender PHP, CSS y HTML",
            "Aprender React y Python también un poco de marketing digital",
            "Continuar proyecto del SENA y llevarlo al mercado",
            "Vender el Producto del SENA",
            "Completar mi ruta personalizada de aprendizaje"
        ],
        "Creatividad": [
            "Mejorar mi escritura en poemas (Versos, rimas, ritmo)",
            "Iniciar clases de guitarra",
            "Programar pequeñas apps y mejorar las ya programadas"
        ],
        "Personal": [
            "Continuar yendo al gimnasio por lo menos 5 veces a la semana",
            "Mejorar mi relación con las personas que más quiero para crear lazos más fuertes",
            "Gestionar mejor mis emociones",
            "Dejar de Procrastinar",
            "Leer mínimo 3 libros al mes"
        ]
    };

    // Actualiza las metas dependiendo del área seleccionada
    $('#area').on('change', function() {
        let area = $(this).val();
        let metasSelect = $('#metas');
        metasSelect.empty();
        metasSelect.append('<option value="">Selecciona una meta</option>');
        
        if (area && metas[area]) {
            metas[area].forEach(function(meta) {
                metasSelect.append('<option value="'+meta+'">'+meta+'</option>');
            });
        }
    });

    // Muestra los campos de actividades cuando se selecciona una meta
    $('#metas').on('change', function() {
        let metaSeleccionada = $(this).val();
        let actividadesDiv = $('#actividades');
        actividadesDiv.empty();

        if (metaSeleccionada) {
            actividadesDiv.append('<h4>Actividades para: ' + metaSeleccionada + '</h4>');

            for (let i = 1; i <= 3; i++) {
                actividadesDiv.append('<div class="mb-3">' +
                    '<label for="actividad'+i+'" class="form-label">Actividad ' + i + ':</label>' +
                    '<input type="text" class="form-control" id="actividad'+i+'" name="actividad'+i+'" placeholder="Ingresa la actividad ' + i + '" required>' +
                    '</div>');
            }
        }
    });
</script>

</body>
</html>
