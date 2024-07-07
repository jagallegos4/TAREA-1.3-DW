<?php
session_start();
if (empty($_SESSION['id_usuario'])) {
    header('Location: login.php');
}    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <link rel="icon" href="../img/navegador.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Gestionar Empleados</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-light"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link text-light fw-bold">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="view_empleados.php" class="nav-link text-light">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a href="view_deudores.php" class="nav-link text-light">Deudores</a>
                    </li>
                    <li class="nav-item">
                        <a href="view_cobranzas.php" class="nav-link text-light">Gestión de Cobranza</a>
                    </li>
                    <li class="nav-item"></li>
                </ul>

            </div>
            <div class="d-flex text-end text-light">
                <span class="px-3 d-none d-md-block" style="font-size: 1.4em;" >
                    <?php
                    echo $_SESSION['nombre_empleado'].' '.$_SESSION['apellido_empleado'];
                    ?>
                </span>
                <span>
                    <a href="../controller/controller_logout.php" class=" text-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cerrar Sesión" style="font-size: 1.4em;"><i class="bi bi-power"></i></a>
                </span>
            </div>
        
                        
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <h1 class="text-center">
                        Regoitrar Nuevo Empleado  
                    </h1>
                    <div class="mb-3">
                        <input type="text" name="nombre" id="nombre" class="form-control-sm" placeholder="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="apellido" id="apellido" class="form-control-sm" placeholder="Apellido" required>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h1 class="text-center mt-5">Gestionar Empleados</h1>
                <div class="d-flex justify-content-center">
                    <a href="view_nuevo_empleado.php" class="btn btn-primary mt-3">Nuevo Empleado</a>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Carlos</td>
                            <td>Sanchez</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>