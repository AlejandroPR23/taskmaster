<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Áreas de Mi Vida</title>
    <link rel="shortcut icon" href="./img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <?php
        include("./nav1.php");
    ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Mapa de Áreas de Mi Vida</h2>

        <!-- Sección para seleccionar área y agregar metas -->
        <div class="card">
            <div class="card-header bg-info text-white text-center">
                Elige un área de tu vida y escribe tus metas
            </div>
            <div class="card-body">
                <form id="formMetas">
                    <div class="mb-3">
                        <label for="area" class="form-label">Selecciona un área de tu vida:</label>
                        <select id="area" class="form-select" required>
                            <option value="">Seleccionar área</option>
                            <option value="Laboral">Laboral</option>
                            <option value="Estudio">Estudio</option>
                            <option value="Creatividad">Creatividad</option>
                            <option value="Personal">Personal</option>
                        </select>
                    </div>

                    <!-- Formulario de metas dinámico -->
                    <div id="metasSection"></div>

                    <button type="submit" class="btn btn-primary">Guardar Metas</button>
                </form>
            </div>
        </div>

        <!-- Sección para mostrar áreas y metas -->
        <div class="mt-5">
            <h4>Mis Áreas y Metas</h4>
            <ul id="areasList" class="list-group">
                <!-- Las metas se agregarán aquí -->
            </ul>
        </div>
    </div>

    <script>
        // Función para crear campos de metas según el área seleccionada
        document.getElementById('area').addEventListener('change', function () {
            const area = this.value;
            const metasSection = document.getElementById('metasSection');
            metasSection.innerHTML = ''; // Limpiar metas previas

            if (area) {
                const label = document.createElement('label');
                label.setAttribute('for', 'meta1');
                label.classList.add('form-label');
                label.innerText = `Escribe tus metas para el área ${area}:`;

                metasSection.appendChild(label);

                // Crear los campos para metas
                for (let i = 1; i <= 3; i++) {
                    const metaInputGroup = document.createElement('div');
                    metaInputGroup.classList.add('input-group', 'mb-3');
                    metaInputGroup.innerHTML = `
                        <span class="input-group-text">Meta ${i}</span>
                        <input type="text" class="form-control" name="meta${i}" placeholder="Escribe tu meta" required>
                        <input type="text" class="form-control" name="metaTime${i}" placeholder="Tiempo estimado (ej. 3 meses)" required>
                    `;
                    metasSection.appendChild(metaInputGroup);
                }
            }
        });

        // Guardar las metas y mostrarlas en una lista
        document.getElementById('formMetas').addEventListener('submit', function (e) {
            e.preventDefault();

            const area = document.getElementById('area').value;
            const metas = [];
            for (let i = 1; i <= 3; i++) {
                const meta = document.querySelector(`[name="meta${i}"]`).value;
                const metaTime = document.querySelector(`[name="metaTime${i}"]`).value;
                if (meta && metaTime) {
                    metas.push({ meta, metaTime });
                }
            }

            if (area && metas.length > 0) {
                const areaItem = document.createElement('li');
                areaItem.classList.add('list-group-item');
                areaItem.innerHTML = `<strong>${area}</strong><br>`;

                metas.forEach(m => {
                    areaItem.innerHTML += `<p>- ${m.meta} (Tiempo estimado: ${m.metaTime})</p>`;
                });

                document.getElementById('areasList').appendChild(areaItem);

                // Limpiar formulario después de agregar las metas
                document.getElementById('formMetas').reset();
                document.getElementById('metasSection').innerHTML = '';
            }
        });
    </script>
</body>

</html>
