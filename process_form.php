<?php
header('Content-Type: text/plain');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400); 
        echo "Semua field (Nama, Email, Pesan) wajib diisi.";
        exit; 
    }

    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($message);

    echo "Thank you for contacting us, we will get back to you shortly.";

} else {
    http_response_code(405); 
    echo "Metode pengiriman tidak valid.";
}

?>