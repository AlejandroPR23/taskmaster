<?php
// Incluye el archivo de conexión a la base de datos
include('db.php');

// Obtiene el código del perfil a eliminar desde la solicitud (request) HTTP
$ID = $_REQUEST['ID'];

// Ejecuta una consulta para eliminar el perfil de la tabla tblperfil donde el código coincide con el proporcionado
$eliminar = $conn->query("DELETE FROM tareas WHERE ID='$ID'");

// Verifica si la consulta de eliminación se ejecutó correctamente
if($eliminar){
    // Si la eliminación fue exitosa, redirecciona a la página 'perfiles.php'
    header('location:./completadas.php');
}
?>