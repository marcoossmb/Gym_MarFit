<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mailer = new PHPMailer(true);

try {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    
    $body = <<<HTML
        <html>
        <head>
            <title>Recuperar Contraseña</title>
        </head>
        <body style="background: linear-gradient(135deg, #F13A11, #F56F3A, #FAA760); color: white; padding: 1rem;">
            <h1>Estimado/a $nombre</h1>
            <p>Hemos recibido una solicitud para cambiar la contraseña asociada a su cuenta en MarFit</p>
            <p>Para garantizar la seguridad de su cuenta, necesitamos verificar que esta solicitud proviene legítimamente de usted.</p>
            <p>Por favor, haga clic en el siguiente enlace para confirmar su intención de cambiar la contraseña:</p>
            <form action="http://localhost/Gym_MarFit/index.php?controller=Login&action=mostrarCambioPassword" method="POST">
                <input type="hidden" name="email" value="$email">
                <button type="submit" class="btn btn-google">Verificar Correo</button>
            </form>
            <p>Si no ha solicitado este cambio o no reconoce esta actividad, le recomendamos que ignore este mensaje y tome las medidas necesarias para asegurar su cuenta.</p>
        </body>
        </html>
    HTML;

    //Server settings
    $mailer->isSMTP();
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'marfittalavera@gmail.com';
    $mailer->Password = 'cjjlvanjfzuabhrc';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    //Recipients
    $mailer->setFrom('marfittalavera@gmail.com');
    $mailer->addAddress($email);

    //Content
    $mailer->isHTML(true);
    $mailer->Subject = 'Recuperar Contraseña';
    $mailer->Body = $body;
    $mailer->AltBody = strip_tags($body);
    $mailer->CharSet = 'UTF-8';

    $rta = $mailer->send();

    header("Location: ./index.php?email=true");
} catch (Exception $e) {
    header("Location: ./index.php?email=false");
}