<?php
$destinatario = 'ignaciosoraka@gmail.com';

$nombre = $_POST['nombre'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];


$mensajeCompleto = "Mensaje de contacto:\n\n";
$mensajeCompleto .= "Nombre: " . $nombre . "\n";
$mensajeCompleto .= "Correo Electrónico: " . $email . "\n";
$mensajeCompleto .= "Asunto: " . $asunto . "\n";
$mensajeCompleto .= "Mensaje: " . $mensaje . "\n";


$asuntoCorreo = "Consulta de " . $nombre;

$header = "From: AITUE " . $email . ">\r\n";
$header .= "Reply-To: " . $email . "\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($destinatario, $asuntoCorreo, $mensajeCompleto, $header)) {
    // Redirigir a la página de agradecimiento
    header("Location: gracias.html");
    exit();
} else {
    ?>
    <h3 class="error">Ocurrió un error, por favor vuelve a intentarlo</h3>
    <?php
}
?>
