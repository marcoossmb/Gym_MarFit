<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$mailer = new PHPMailer();

try {
    $email = $_POST['cf-email'];
    $asunto = $_POST['cf-asunto'];
    $mensaje = $_POST['cf-message'];

    $body = <<<HTML
        <html>
        <head>
            <title>Contacto desde la web</title>
        </head>
        <body style="background: linear-gradient(135deg, #F13A11, #F56F3A, #FAA760); color: white; padding: 1rem;">
            <h1>Contacto desde la web</h1>
            <p><strong>De:</strong> $email</p>
            <h2>Mensaje</h2>
            <p>$mensaje</p>
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
    $mailer->setFrom($email);
    $mailer->addAddress('marfittalavera@gmail.com', 'MarFit web');

    //Content
    $mailer->isHTML(true);
    $mailer->Subject = $asunto;
    $mailer->Body = $body;
    $mailer->AltBody = strip_tags($body);
    $mailer->CharSet = 'UTF-8';

    $rta = $mailer->send();

    header("Location: ./index.php?email=true");
} catch (Exception $e) {
    error_log("Error al enviar el correo: " . $mailer->ErrorInfo);
    header("Location: ./index.php?email=false");
}