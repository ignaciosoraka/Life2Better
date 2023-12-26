<?php
$destinatario = 'ignaciosoraka@gmail.com';

$nombre = $_POST['nombre'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$ciudad = $_POST['ciudad'];
$mensaje = $_POST['mensaje'];

// Obtener las opciones seleccionadas de la lista de checkboxes
$menu913 = isset($_POST['menu-913']) ? $_POST['menu-913'] : [];
$menu913_text = implode(", ", $menu913);  // Convertir array a cadena separada por comas

$mensajeCompleto = "Mensaje de contacto:\n\n";
$mensajeCompleto .= "Nombre: " . $nombre . "\n";
$mensajeCompleto .= "Correo Electrónico: " . $email . "\n";
$mensajeCompleto .= "Ciudad: " . $ciudad . "\n";

// Incluir opciones seleccionadas de la lista de checkboxes
if (!empty($menu913)) {
    $mensajeCompleto .= "A qué te dedicas: " . $menu913_text . "\n";
}

$mensajeCompleto .= "Mensaje: " . $mensaje . "\n";

$asuntoCorreo = "Consulta de " . $nombre;

$header = "From: AITUE <" . $email . ">\r\n";
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

