<?php
session_start();
if (empty($_SESSION['id_usuario'])) {
    header('Location: login.php');
}    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="img/navegador.png" type="image/x-icon">
    <title>Cobranzas y Cartera</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container text-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        
                    </li>
                </ul>

            </div>
            <?php
            echo $_SESSION['nombre_empleado'].' '.$_SESSION['apellido_empleado'];
            ?>
        </div>
    </nav>
    
</body>
</html>