<?php
require_once '../config/conexion.php';
require './funciones.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Cambiar Contraseña</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="new_password">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirmar Nueva Contraseña</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <input for='id_usuario' type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_GET['id']; ?>">
                            <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Manejar el envío del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userID = $_POST['id_usuario'];

        // Verificar si se proporcionó el ID del usuario
        if ($userID === null) {
            // Si no se proporcionó, mostrar un mensaje de error
            echo "No se proporcionó un ID de usuario válido.";
            header("Location: recuperar.php");
            exit();
        }

        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if (passwordsMatch($newPassword, $confirmPassword)) {
            if (updatePassword($userID, $newPassword, $conn)) {
                echo '<div class="alert alert-success">Contraseña actualizada correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger">Error al actualizar la contraseña.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Las contraseñas no coinciden.</div>';
        }
    }
    ?>
</body>

</html>