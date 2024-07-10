<?php
if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql = $conn->query("delete from empleados where id_empleado='$id'");
    if ($sql==1) {
        echo "<script>alert('Empleado eliminado correctamente');</script>";
    }else{
        echo "<div class='alert alert-danger'>Error al eliminar el vehículo</div>";
    }
}
?>