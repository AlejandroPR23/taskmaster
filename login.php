<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitización de entradas
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Uso de prepared statements para evitar SQL Injection
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificación de contraseña usando password_verify
        if (password_verify($password, $row['Contrasena'])) {
            // Iniciar sesión
            $_SESSION['username'] = $username;
            $_SESSION['Id'] = $row['ID'];
            header("Location: index.php");
            exit;
        } else {
            // Contraseña incorrecta
            $error = "Nombre de usuario o contraseña incorrectos";
        }
    } else {
        // Usuario no encontrado
        $error = "Nombre de usuario o contraseña incorrectos";
    }

    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión - TaskMaster</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .error {
            margin-top: 20px;
            background-color: tomato;
            color: white;
            padding: 0.1em;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .error-div {
            padding: 0rem 3rem 0rem 3rem;
        }

        body {
            background-image: url('./img/gris.jpg');
            background-size: cover;
        }

        .fas {
            margin-right: 10px;
        }
    </style>
</head>

<body>


    <?php
    include("./header.php");
    ?>

    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <img class="rounded-circle border border-black "
                            src="img/Free-Logo-Maker-Get-Custom-Logo-Designs-in-Minutes-Looka.png" alt="Bootstrap"
                            width="130" height="80">
                        <h4 class="text-dark mt-1">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body bg-light p-4">
                        <form method="POST" action="">
                            <div class="form-group mb-3">
                                <label class="form-label" for="username"><i class="fa-solid fas fa-user"></i>Nombre de
                                    Usuario:</label>
                                <input class="form-control" type="text" name="username" id="username"
                                    autocomplete="given-name" placeholder="Ingresa tu nombre de usuario" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password"><i
                                        class="fa-solid fas fa-lock"></i>Contraseña:</label>
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="Ingresa tu contraseña" required>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-center btn-primary btn-block">Iniciar
                                    sesión</button>
                            </div>
                            <div class="error-div">
                                <?php if (isset($error)) {
                                    echo "<p class='error'>$error</p>";
                                } ?>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer text-center ">
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