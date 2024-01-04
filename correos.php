<?php
$destinatario = 'ignaciosoraka@gmail.com';

$nombre = $_POST['nombre'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$provincia = $_POST['provincia'];
$mensaje = $_POST['mensaje'];

// Obtener las opciones seleccionadas de las listas de selección
$intereses = isset($_POST['Intereses']) ? $_POST['Intereses'] : '';
$ocupacion = isset($_POST['Ocupacion']) ? $_POST['Ocupacion'] : '';
$comoNosConociste = isset($_POST['ComoNosConociste']) ? $_POST['ComoNosConociste'] : '';

$mensajeCompleto = "Mensaje de contacto:\n\n";
$mensajeCompleto .= "Nombre: " . $nombre . "\n";
$mensajeCompleto .= "Correo Electrónico: " . $email . "\n";
$mensajeCompleto .= "Provincia: " . $provincia . "\n";

// Incluir opciones seleccionadas de las listas de selección
if (!empty($intereses)) {
    $mensajeCompleto .= "¿Qué estás buscando?: " . $intereses . "\n";
}

if (!empty($ocupacion)) {
    $mensajeCompleto .= "¿A qué te dedicas?: " . $ocupacion . "\n";
}

if (!empty($comoNosConociste)) {
    $mensajeCompleto .= "¿Cómo nos conociste?: " . $comoNosConociste . "\n";
}

$mensajeCompleto .= "Mensaje: " . $mensaje . "\n";

$asuntoCorreo = "Consulta de " . $nombre;

$header = "From: Life2Better <" . $email . ">\r\n";
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


