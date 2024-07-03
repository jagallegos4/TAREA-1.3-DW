<?php 
include('model/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="img/navegador.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>

<body>
    
    <div class="container w-75 rounded shadow mt-4">
        <div class="row align-items-stretch">
            <div class="col bg-img d-none d-md-block rounded">

            </div>
            <div class="col ladoDerecho p-5 rounded-end">
                <div class="text-center">
                    <img src="img/navegador.png" width="48" alt="" srcset="">
                </div>
                <h2 class="fw-bold text-center py-5 text-light">Login</h2>
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="usuario" class="form-label text-light">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label text-light">Contraseña</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="view">
                        <div class="fas fa-eye verPassword"></div>
                    </div>
                    <div class="d-grid pb-5">
                        <button type="submit" class="btn btn-primary" name="btnLogin" id="btnLogin">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</body>

</html>