<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Diario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 800px;
        }

        .card {
            background: #f7f2e9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: 'Courier New', Courier, monospace;

        }

        #diario-texto {
            background: #fff8e1;
            border: 2px solid #b8a67d;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .card-title {
            font-weight: bold;
        }

        .bi-calendar-date {
            margin-left: 10px;
        }
    </style>
</head>

<body>

<?php
include('./nav1.php');
?>

    <div class="container mt-5">
        <div class="card">
            <h2>Mi Diario</h2>
            <div class="card-body">
                <h5 class="card-title">
                    <span id="fecha"></span>
                    <i class="bi bi-calendar-date" id="icono-calendario"></i>
                </h5>
                <form method="POST" action="guardar_diario.php">
                    <div class="mb-3">
                        <textarea class="form-control" id="diario-texto" name="contenido" rows="6"
                            placeholder="Escribe aquí..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Entrada</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // Obtener la fecha y mostrarla en el formato adecuado
        const fecha = new Date();
        const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const fechaActual = fecha.toLocaleDateString('es-ES', opciones);
        document.getElementById('fecha').textContent = fechaActual;
    </script>
</body>

</html>