<?php
// Incluye el archivo de conexión
include('db.php');



// Verifica si se ha enviado un formulario con los campos necesarios no vacíos
if(!empty($_POST['Nombre']) && !empty($_POST['Descripcion']) && !empty($_POST['Usuario']) && !empty($_POST['Categoria']) && !empty($_POST['Estado'])){
    // Formatea el valor del campo 'Nombre' para evitar inyección de SQL y convertirlo a mayúsculas y minúsculas
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Descripcion = ucfirst(strtolower($_POST['Descripcion']));
    $Usuario = $_POST['Usuario'];
    $Categoria = $_POST['Categoria'];
    $Estado = $_POST['Estado'];
    
    // Consulta si ya existe una tarea con el mismo nombre para el mismo usuario en la base de datos
    $consulta = $conn->query("SELECT * FROM tareas WHERE nombre='$Nombre' AND usuario='$Usuario'");
    
    // Verifica si se encontraron resultados en la consulta, lo que indica que la tarea ya existe
    if(mysqli_num_rows($consulta) > 0){
        header('location:index.php');
        exit();

    } else {
        // Si la tarea no existe, realiza la inserción de la nueva tarea en la base de datos
        $insert = $conn->query("INSERT INTO tareas VALUES(null, '$Nombre', '$Descripcion', '$Usuario', '$Categoria', '$Estado')");
        
        // Redirecciona a la página 'index.php'
        header('location:index.php');
        exit(); // Asegura que se detenga la ejecución del script después de la redirección
    }
}
?>
