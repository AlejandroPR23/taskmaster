// main.js
jQuery(document).ready(function () {
    jQuery('#nueva_tabla').DataTable({
        "scrollY": true,    
        "scrollCollapse": true,  
        "columns": [
            null, // Nombre de la Tarea
            null, // Descripción
            null, // Categoría
            null, // Estado
            { "searchable": false } // Acciones (botones y modales)
        ]
    });
});
