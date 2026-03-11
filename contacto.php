<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$mensaje = $_POST['mensaje'];

$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'molinapasst@gmail.com';
        $mail->Password   = 'mmfx nxqk hgap qvna';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
    
        // Remitente y destinatario
        $mail->setFrom('molinapasst@gmail.com', 'Mensaje de contacto');
        $mail->addReplyTo($correo, $nombre); // El correo al que se responderá
        $mail->addAddress('molinapasst@gmail.com', 'Yahir');
    
        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto desde tu sitio web KNCPT';
        $mail->Body = "
            <h3>Nuevo mensaje de contacto</h3>
            <p><strong>Nombre:</strong> {$nombre}</p>
            <p><strong>Email:</strong> {$correo}</p>
            <p><strong>Mensaje:</strong><br>{$mensaje}</p>";
    
        $mail->send();
        echo "<p>Mensaje enviado correctamente. Gracias por contactarnos.</p>";
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Concepto</title>
</head>
<body>
    <header class="cabecera">
        <div class="barra-nav">
            <div class="logo">
                <a href="index.html">
                <img class="imagen--logo" src="/img/kncpt2.png" alt="Logo de Concepto">
                 </a>
            </div>
            <div class="enlaces">
                <a href="index.html">Inicio</a>
                <a href="proyectos.html">Proyectos</a>
                <a href="contacto.php">Contacto</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="principal">
            <h3>Contacto</h3>
            <form class="formulario" method="post" action="contacto.php">
                <div class="campo">
                    <label class="campo_label" for="nombre">Nombre:</label>
                    <input class="campo_field"  type="text" placeholder="Tu nombre" name="nombre">
                </div>
                <div class="campo">
                    <label class="campo_label" for="email">Email:</label>
                    <input class="campo_field" type="email" placeholder="E-mail" name="email">
                </div>
                <div class="campo">
                    <label class="campo_label" for="Mensaje">Mensaje:</label>
                    <textarea class="campo_field campo_field--textarea" name="mensaje"></textarea>
                </div>
                <div class="campo">
                    <input type="submit" value="Enviar" class="boton">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>Derechos reservados. Yahir Molina 2025</p>
    </footer>
</body>
</html>