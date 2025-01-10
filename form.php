<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $product = $_POST["product"];
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($phone) || empty($product)) {
        http_response_code(400);
        echo "Please fill in all the required fields.";
        exit;
    }

    $recipient = "ferre.savzla@gmail.com";
    $subject = "New Appointment Request from $name";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Product: $product\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Thank you! Your appointment request has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}

$recaptcha_secret = "TU_CLAVE_SECRETA";
$recaptcha_response = $_POST['g-recaptcha-response'];

// Verificar la respuesta del reCAPTCHA
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
$response_keys = json_decode($response, true);

if (intval($response_keys["success"]) !== 1) {
    http_response_code(400);
    echo "Verificación reCAPTCHA fallida. Intenta nuevamente.";
    exit;
}

?>
