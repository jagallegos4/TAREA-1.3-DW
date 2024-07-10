<?php
include('../model/conexion.php');
$sql = "SELECT * FROM sucursal";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //$eleccion = $row['id_sucursal']==$idSucursal ? "selected" : "";
        echo "<option class='text-center' value='" . $row['id_sucursal'] . "'>" . $row['nombre_sucursal'] . "</option>";
    }
} else {
    echo "0 results";
}
