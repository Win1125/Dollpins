<?php
require_once '../config/conexion.php';
require '../vendor/autoload.php';
require './funciones.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Restablecer Contraseña</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="./login.php" class="btn btn-secondary">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Librerias de phpmailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $errors = array();

    if (!empty($_POST)) {
        $email = $_POST["correo"];

        if (!isEmail($email)) {
            $errors[] = "Debe ingresar un correo electronico valido";
        }

        if (!emailExiste($email, $conn)) {
            echo '<div class="alert alert-danger mt-3">No se encontro el correo electronico</div>';
            $errors[] = "El correo electronico no existe";
        } else {
            //instancia de phpmailer
            $mail = new PHPMailer(true);

            $user_id = obtenerIdUsuarioPorCorreo($email, $conn);

            //manejo de errores
            try {
                //muestra todos los mensajes que ocurren al enviar el correo, descomentar de ser el caso
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;

                //poner correo desde el cual se envia
                $remitente = ''; //colocar un correo
                $mail->Username = $remitente;
                $mail->Password = ''; //colocar la contrasena de aplicacion del correo
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                //poner el correo desde el cual se envia
                $mail->setFrom($remitente, 'Dollpins');

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['correo'])) {
                    // Construir el enlace con el ID del usuario como parámetro
                    $cambioPassLink = "http://localhost/dollpins/admin/cambiopass.php?id=" . urlencode($user_id);

                    //direccion que va a RECIBIR EL CORREO
                    $mail->addAddress($_POST['correo']);
                    $mail->isHTML(true);
                    $mail->Subject = 'Change Password';
                    $mail->Body = "Para realizar el cambio de Contraseña <a href='$cambioPassLink'>haga click en el siguiente enlace</a>";
                    $mail->send();

                    echo '<div class="alert alert-success mt-3">Correo enviado</div>';
                }
            } catch (Exception $e) {
                echo '<div class="alert alert-danger mt-3">Error al enviar el correo: ' . $mail->ErrorInfo . '</div>';
                throw $e;
            }
        }
    }
    $errors = array();
    ?>
</body>

</html>