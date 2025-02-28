<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diario Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .diary-entry,h1 {
            background-color:#f7f2e9 !important;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: 'Courier New', Courier, monospace;
            margin-bottom: 15px;
        }
        .diary-date {
            font-weight: bold;
            color: #6c757d;
        }
    </style>
</head>

<body class="bg-light">
    <?php
    include("nav1.php");
    ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Mi Diario</h1>

        <!-- Diario de entradas -->
        <div id="diaryEntries"></div>
    </div>

    <script>
        // Datos ficticios de entradas de diario
        const entries = [
            {
                date: "2024-11-01",
                content: "Hoy fue un día bastante productivo. Logré avanzar en varios proyectos y finalmente terminé la presentación que tenía pendiente. Me siento bien, aunque algo cansado."
            },
            {
                date: "2024-11-02",
                content: "Hoy me sentí un poco agobiado. A veces parece que el tiempo no es suficiente para todo lo que quiero lograr. Sin embargo, tomé un descanso y leí un libro para despejarme."
            },
            {
                date: "2024-11-03",
                content: "Tuve una conversación interesante con un amigo sobre los planes futuros. Me hizo reflexionar sobre las decisiones que he tomado hasta ahora. Tal vez es hora de hacer algunos cambios."
            },
            {
                date: "2024-11-04",
                content: "Hoy fui al gimnasio y me sentí más fuerte que nunca. Después de eso, trabajé un poco en mis metas creativas, como aprender a programar en nuevos lenguajes."
            },
            {
                date: "2024-11-05",
                content: "Fue un día relajante. Salí a caminar y disfruté del clima. A veces, un poco de aire fresco es todo lo que necesito para renovar mis energías."
            },
            {
                date: "2024-11-06",
                content: "Empecé a planificar mis metas para el próximo mes. Me siento motivado y con ganas de lograr grandes cosas. Será un desafío, pero estoy preparado para enfrentarlo."
            }
        ];

        // Renderizar entradas en la página
        const diaryEntriesDiv = document.getElementById('diaryEntries');

        entries.forEach(entry => {
            const entryDiv = document.createElement('div');
            entryDiv.classList.add('diary-entry');

            const dateElement = document.createElement('p');
            dateElement.classList.add('diary-date');
            dateElement.textContent = `Fecha: ${entry.date}`;

            const contentElement = document.createElement('p');
            contentElement.textContent = entry.content;

            entryDiv.appendChild(dateElement);
            entryDiv.appendChild(contentElement);

            diaryEntriesDiv.appendChild(entryDiv);
        });
    </script>
</body>

</html>
