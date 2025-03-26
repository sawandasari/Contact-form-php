<?php
// checking if this is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve the input gievn by the user
    $name = filter_input(type: INPUT_POST, var_name: "name", filter: FILTER_SANITIZE_STRING);
    $email = filter_input(type: INPUT_POST, var_name: "email", filter: FILTER_SANITIZE_EMAIL);
    $message = filter_input(type: INPUT_POST, var_name: "message", filter: FILTER_SANITIZE_STRING);

    // validating inputs
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(value: ["success" => false, "message" => "All fields are required."]);
        exit;
    }

    if (!filter_var(value: $email, filter: FILTER_VALIDATE_EMAIL)) {
        echo json_encode(value: ["success" => false, "message" => "Invalid email format."]);
        exit;
    }

    // this is for demo purposes
    $to = "sawan.dasari@gmail.com"; 
    $subject = "New Contact Form Message from $name";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    
    //mail($to, $subject, $body);

    // if sending email fails
    if (!mail($to, $subject, $body)) {
    error_log("Failed to send email to $to");
    echo json_encode(["success" => false, "message" => "Failed to send message. Please try again later."]);
    exit;
    }

    // return a success response
    echo json_encode(value: ["success" => true, "message" => "Message sent successfully!"]);
} else {
    // andle invalid requests
    echo json_encode(value: ["success" => false, "message" => "Invalid request."]);
}
?>
