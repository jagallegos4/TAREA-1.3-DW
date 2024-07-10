<?php
session_start();
if (empty($_SESSION['id_usuario'])) {
    #header('Location: login.php');
    
}
include "../model/conexion.php";
$idEmpleado=$_GET["id"];  #recibe el id de la etiqueta <a> de view_empleados.php
$sql = $conn->query("select * from empleados where id_empleado='$idEmpleado'");
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
    <script src="https://kit.fontawesome.com/7aaabef60b.js" crossorigin="anonymous"></script>
    <title>Actualizar Empleados</title>
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
            <div class="col-4"></div>
            <div class="col-4">
                <h3 class="text-center text-light my-3">Actualizar Empleado</h3>
                <form action="" method="post">
                <?php
                include "../controller/controller_updateEmpleado.php";
                while($datos = $sql->fetch_object()){?>
                    <div class="mb-2">
                        <input type="text" name="nombreEmpleado" id="nombreEmpleado" class="form-control-sm w-100" placeholder="Nombre" value='<?= $datos->nombre_empleado?>' required>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="apellido" id="apellido" class="form-control-sm w-100" placeholder="Apellido" value='<?= $datos->apellido_empleado?>' required>
                    </div>
                    <div class="mb-2">
                        <input type="number" name="cedula" id="cedula" class="form-control-sm w-100" placeholder="Cedula" value='<?= $datos->cedula_empleado?>' disabled required>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" id="email" class="form-control-sm w-100" placeholder="Correo electrónico" value='<?= $datos->email?>'>
                    </div>
                    <div class="mb-2">
                        <input type="number" name="telefono" id="telefono" class="form-control-sm w-100" placeholder="Teléfono" value='<?= $datos->telefono_empleado?>'>
                    </div>
                    <div class="mb-2">
                        <input type="hidden" name="idEmpleado" id="idEmpleado" value='<?= $datos->id_empleado?>'>
                    </div>
                    <?php
                    }?>
                    <div class="mb-2">
                        <select name="idSucursal" id="idSucursal" class="form-select-sm text-center w-50" required>
                            <option value="" disabled selected hidden class="form-select-sm text-center">--Sucursal--</option>
                            <?php 
                            include ("../includes/listarSucursales.php");
                            ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-outline-light fw-bold" name="btnActualizar" id="btnActualizar" value="Actualizar">
                    <a type="button" href="view_empleados.php" class="btn btn-outline-danger">Cancelar</a>
                
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>