<?php
include('db.php');

if(!empty($_POST['Nombre']) && !empty($_POST['Descripcion']) && !empty($_POST['Usuario']) && !empty($_POST['Categoria'])  && !empty($_POST['Estado'])  && !empty($_POST['ID'])){
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Descripcion=$_POST['Descripcion'];
    $Usuario=$_POST['Usuario'];
    $Categoria=$_POST['Categoria'];
    $Estado=$_POST['Estado'];
    $ID=$_POST['ID'];

    $upd = $conn->query("UPDATE tareas SET Nombre='$Nombre', Descripcion='$Descripcion', Usuario='$Usuario',Categoria='$Categoria',Estado='$Estado' WHERE ID='$ID'");
    
    if($upd) {
        header('location:index.php');
        exit(); // Termina el script después de redirigir para evitar ejecución adicional.
    } else {
        // Manejar el caso cuando la actualización falla
        echo "<script>alert('Error al actualizar la tarea.');</script>";
    }
} else {
    echo "<script>alert('Por favor complete todos los campos.');</script>";
}
?>