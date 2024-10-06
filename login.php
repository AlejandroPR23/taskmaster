<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE Nombre='$username' AND Contrasena='$password'";
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_usuario = $row['ID'];
        $_SESSION['username'] = $username;
        $_SESSION['Id']=$id_usuario;
        header("Location: index.php");
    } else {
        $error = "Nombre de usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión - TaskMaster</title>
    <link rel="shortcut icon" href="img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.ico"
        type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container-fluid">

    <nav class="navbar bg-info border border-3 border-black d-flex justify-start rounded-3">

        <a class="navbar-brand ms-3" href="#">
            <img class="rounded-circle border border-black "
                src="img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.png" alt="Bootstrap" width="130"
                height="80">
        </a>

        <div class="gap-2">
        <a class="btn btn-light border border-2 border-black me-md-2 p-3"  href="login.php" type="button"> <span>Iniciar sesión</span></a>

        <a class="btn btn-light border border-2 border-black me-md-2 p-3"  href="registro.php" type="button"> <span>Registrarse</span></a>
        </div>
       

    </nav>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                <div class="card-header bg-light text-white text-center">
                    <img class="rounded-circle border border-black "
                src="img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.png" alt="Bootstrap" width="130"
                height="80">
                        <h4 class="text-black">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body bg-info p-4">
                        <form method="POST" action="">
                            <div class="form-group mb-3">
                                <label class="form-label" for="username">Nombre de Usuario:</label>
                                <input class="form-control" type="text" name="username" id="username" autocomplete="given-name" placeholder="Ingresa tu nombre de usuario" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Contraseña:</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-center btn-primary btn-block">Iniciar
                                    sesión</button>
                            </div>
                            <div >
                                <?php if (isset($error)) {
                                    echo "<p>$error</p>";
                                } ?>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>&copy; 2024 TaskMaster Solutions</small>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>