<?php
include('../model/conexion.php');
include('../controller/controller_validar.php');
if (isset($_POST["btnGuardar"])) {
    $nombre = $_POST["nombreEmpleado"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $idSucursal = $_POST["idSucursal"];
    $sqlInsertar = "insert into empleados(id_sucursal,nombre_empleado,apellido_empleado,cedula_empleado,telefono_empleado,email) values($idSucursal,'$nombre','$apellido','$cedula','$telefono','$email')";
    $sqlValidar = "select * from empleados where cedula_empleado='$cedula'";
    $validar = $conn->query($sqlValidar);

    if ($validar->num_rows > 0) {
        echo '<div class="text-bg-danger text-center my-2" role="alert">Empleado ya existe</div>';
    } else {
        if (validarCedula($cedula)) {
            if ($conn->query($sqlInsertar)) {
                echo '<div class="text-bg-success text-center my-2" role="alert">Empleado guarado exitosamente</div>';
            } else {
                echo '<div class="text-bg-danger text-center my-2" role="alert">Error al guardar empleado</div>';
            }
        } else {
            echo '<div class="text-bg-warning text-center my-2" role="alert">La cédula no existe, ingrece un número de cédula válido</div>';
        }
    }
}
