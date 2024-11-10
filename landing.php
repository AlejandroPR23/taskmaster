<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskMaster - Gestión de Tareas</title>
    <link rel="shortcut icon" href="./img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.ico" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <!-- Font Awesome (para íconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .hero-section {
            background-image: url('./img/pexels-magda-ehlers-pexels-985266.webp');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        
        }

        .benefit-icon {
            font-size: 50px;
            color: #6c757d;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }

        .cta-btn:hover {
            border: 1px solid #0056b3;
            background-color: #0056b3;
        }
    </style>
</head>

<body class="bg-light">

    <?php
    include("./header.php");
    ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold">Gestiona tus tareas de forma eficiente</h1>
            <p class="lead">Usa herramientas como la matriz de Eisenhower, journaling, planificación semanal y más.
                ¡Todo lo que necesitas en un solo lugar!</p>
            <a href="#features" class="cta-btn btn btn-info">Descubre más</a>
        </div>
    </section>

    <!-- Características de TaskMaster -->
    <section id="features" class="container mt-2 py-3">
        <h2 class="text-center mb-4">Características principales</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <i class="fas fa-tasks benefit-icon mb-3"></i>
                <h4>Matriz de Eisenhower</h4>
                <p>Organiza tus tareas según su urgencia e importancia para priorizar lo que realmente importa.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-calendar-week benefit-icon mb-3"></i>
                <h4>Planeación Semanal</h4>
                <p>Planifica tu semana con facilidad, estableciendo metas y tareas clave para cada día.</p>
            </div>
            <div class="col-md-4 text-center">
            <i class="fas fa-solid benefit-icon fa-book-journal-whills mb-3"></i>
                <h4>Journaling</h4>
                <p>Lleva un registro personal de tus pensamientos, reflexiones y avances de manera sencilla.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 text-center">
                <i class="fas fa-heart benefit-icon mb-3"></i>
                <h4>Puntos de emoción</h4>
                <p>Mide cómo te sientes al completar tareas, para identificar patrones y mejorar tu bienestar.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-cogs benefit-icon mb-3"></i>
                <h4>Personalización</h4>
                <p>Agrega y ajusta módulos según tus necesidades, para tener la experiencia perfecta de productividad.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-cloud benefit-icon mb-3"></i>
                <h4>Sincronización en la nube</h4>
                <p>Accede a tus tareas desde cualquier dispositivo con nuestra sincronización en la nube.</p>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="text-center py-5">
        <h2>Comienza a organizarte hoy</h2>
        <p>Regístrate y empieza a gestionar tus tareas de manera eficiente con TaskMaster.</p>
        <a href="./registro.php" class="cta-btn btn btn-info">Únete ahora</a>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <p>&copy; 2024 TaskMaster Solutions. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>