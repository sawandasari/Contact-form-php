<?php
// I check if this is a POST request

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // I sanitize and retrieve user input
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);

    // I validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email format."]);
        exit;
    }

    // I create an email message (this is for demo purposes)
    $to = "sawan.dasari@gmail.com"; 
    $subject = "New Contact Form Message from $name";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    
    // mail($to, $subject, $body);

    // I return a success response
    echo json_encode(["success" => true, "message" => "Message sent successfully!"]);
} else {
    // I handle invalid requests
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
