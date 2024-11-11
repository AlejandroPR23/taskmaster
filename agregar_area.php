<?php
// Incluye el archivo de conexión
include('db.php');



// Verifica si se ha enviado un formulario con los campos necesarios no vacíos
if(!empty($_POST['Nombre'])  && !empty($_POST['Usuario'])){
    // Formatea el valor del campo 'Nombre' para evitar inyección de SQL y convertirlo a mayúsculas y minúsculas
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Usuario = $_POST['Usuario'];
    
    // Consulta si ya existe una tarea con el mismo nombre para el mismo usuario en la base de datos
    $consulta = $conn->query("SELECT * FROM areas WHERE Nombre='$Nombre' AND Usuario='$Usuario'");
    
    // Verifica si se encontraron resultados en la consulta, lo que indica que la tarea ya existe
    if(mysqli_num_rows($consulta) > 0){
        header('location:./AreasVida.php');
        exit();

    } else {
        // Si la tarea no existe, realiza la inserción de la nueva tarea en la base de datos
        $insert = $conn->query("INSERT INTO areas VALUES(null, '$Usuario', '$Nombre')");
        // Redirecciona a la página 'index.php'
        header('location:./AreasVida.php');
        exit(); // Asegura que se detenga la ejecución del script después de la redirección
    }
}
?>
