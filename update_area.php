<?php
include('db.php');

if(!empty($_POST['Nombre'])  && !empty($_POST['Usuario']) && !empty($_POST['ID'])){
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Usuario=$_POST['Usuario'];
    $ID=$_POST['ID'];

    $upd = $conn->query("UPDATE areas SET Usuario='$Usuario', Nombre='$Nombre' WHERE ID='$ID'");
    
    if($upd) {
        header('location:./AreasVida.php');
        exit(); // Termina el script después de redirigir para evitar ejecución adicional.
    } else {
        // Manejar el caso cuando la actualización falla
        echo "<script>alert('Error al actualizar el area o proyecto.');</script>";
    }
} else {
    echo "<script>alert('Por favor complete todos los campos.');</script>";
}
?>