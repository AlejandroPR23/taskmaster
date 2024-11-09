// main.js
jQuery(document).ready(function () {
    jQuery('#nueva_tabla').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        "columns": [
            null, // Nombre de la Tarea
            null, // Descripción
            null, // Categoría
            null, // Estado
            { "searchable": false } // Acciones (botones y modales)
        ]
    });
});
