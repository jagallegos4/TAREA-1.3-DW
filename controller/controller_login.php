<?php
session_start();
include('model/conexion.php');
if (empty($_POST['btnLogin'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $sql = $conn -> query("select u.id_usuario, e.nombre_empleado, e.apellido_empleado, u.usuario, u.password from empleados e inner join usuarios u on e.id_empleado = u.id_usuario WHERE usuario = '$usuario' AND password = '$password';");
        if ($datos = $sql->fetch_object()) {
            $_SESSION['id_usuario'] = $datos->id_usuario;
            $_SESSION['nombre_empleado'] = $datos->nombre_empleado;
            $_SESSION['apellido_empleado'] = $datos->apellido_empleado;
            header('Location: index.php');
        }
        else {
            echo '<div class="text-center text-bg-danger" role="alert">Usuario o contraseña incorrectos</div>';
        }
    } else {
        echo '<div class="text-bg-warning text-center text-black-50" role="alert">Debe llenar todos los campos</div>';
    }
}

