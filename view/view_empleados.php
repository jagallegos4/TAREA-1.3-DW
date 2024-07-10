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
    <script src="https://kit.fontawesome.com/7aaabef60b.js" crossorigin="anonymous"></script>
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
        <h3 class="text-center text-light">Empleados</h3>
        <div class="row">
            <div class="col-md-3">
            <h4 class="text-center text-light mb-3">Nuevo Empleado</h4>
                <form action="" method="post">
                    <div class="mb-2">
                        <input type="text" name="nombreEmpleado" id="nombreEmpleado" class="form-control-sm w-100" placeholder="Nombre" required>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="apellido" id="apellido" class="form-control-sm w-100" placeholder="Apellido" required>
                    </div>
                    <div class="mb-2">
                        <input type="number" name="cedula" id="cedula" class="form-control-sm w-100" placeholder="Cedula" required>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" id="email" class="form-control-sm w-100" placeholder="Correo electrónico">
                    </div>
                    <div class="mb-2">
                        <input type="number" name="telefono" id="telefono" class="form-control-sm w-100" placeholder="Teléfono">
                    </div>
                    <div class="mb-2">
                        <select name="idSucursal" id="idSucursal" class="form-select-sm text-center w-50" required>
                            <option value="" disabled selected hidden class="form-select-sm text-center">--Sucursal--</option>
                            <?php 
                            include ("../includes/listarSucursales.php");
                            ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-outline-light fw-bold" name="btnGuardar" id="btnGuardar" value="Guardar">
                    <div class="mb-2">
                        <?php
                        include ("../controller/controller_registrarEmpleado.php");
                        ?>
                    </div>
                </form>                   
            </div>
            <div class="col-md-9 d-md-block d-none">
                <h4 class="text-center mb-3 text-light">Lista de Empleados</h4>
                <?php
                    include ('../controller/controller_delateEmpleado.php')
                ?>
                <table class="table table-striped table-sm table-dark rounded d-md-block">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cédula</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Sucursal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include ('../model/conexion.php');
                    $sql = "select e.id_empleado,e.nombre_empleado, e.apellido_empleado, e.cedula_empleado, e.telefono_empleado, e.email, s.nombre_sucursal from empleados e inner join sucursal s on e.id_sucursal = s.id_sucursal;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>'.$row['nombre_empleado'].'</td>';
                            echo '<td>'.$row['apellido_empleado'].'</td>';
                            echo '<td>'.$row['cedula_empleado'].'</td>';
                            echo '<td>'.$row['email'].'</td>';
                            echo '<td>'.$row['telefono_empleado'].'</td>';
                            echo '<td>'.$row['nombre_sucursal'].'</td>';
                            echo '<td>
                            <a href="view_updateEmpleado.php?id='.$row['id_empleado'].'" class="btn btn-outline-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a> 
                            <a onclick="return eliminar()" href="view_empleados.php?id='.$row['id_empleado'].'" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>';
                            echo '</tr>';
                        }
                    }        
                    ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>