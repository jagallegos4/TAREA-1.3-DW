<?php
//session_start();
include('../model/conexion.php');

if (isset($_POST["btnActualizar"])) {
    $idEmpleado = $_POST["idEmpleado"];
    $nombre = $_POST["nombreEmpleado"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $idSucursal = $_POST["idSucursal"];
    $sql = "update empleados set nombre_empleado='$nombre', apellido_empleado='$apellido', telefono_empleado='$telefono', email='$email', id_sucursal=$idSucursal where id_empleado=$idEmpleado";
    if ($conn->query($sql)) {
        echo "<script>alert('Información actualizada correctamente');</script>";
        echo "<script>location = 'view_empleados.php';</script>";
        #echo '<div class="text-bg-success text-center my-2" role="alert">Empleado actualizado exitosamente</div>';
    } else {
        echo '<div class="text-bg-danger text-center my-2" role="alert">Error al actualizar empleado</div>';
    }
}

?>