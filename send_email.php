<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Definir el correo de destino
    $to = "noblemajestic06@gmail.com";
    $subject = "Nuevo mensaje de contacto de tu portafolio";

    // Crear el cuerpo del correo
    $body = "Nombre: $name\n";
    $body .= "Correo: $email\n\n";
    $body .= "Mensaje:\n$message";

    // Encabezados para asegurar que el correo viene del formulario
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Gracias por tu mensaje. Te responderé pronto.');</script>";
    } else {
        echo "<script>alert('Hubo un error al enviar el mensaje. Por favor, intenta nuevamente.');</script>";
    }
}
?>
