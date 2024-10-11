<?php
// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Check if all required fields are filled
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare email content
    $to = 'your_email@gmail.com'; // Your email address where you want to receive the message
    $subject = 'New Contact Form Submission';
    $message_body = "Name: $name\n";
    $message_body .= "Email: $email\n";
    $message_body .= "Message:\n$message\n";

    // Set additional email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $message_body, $headers)) {
        echo "Form submitted successfully!";
    } else {
        echo "Failed to submit form. Please try again later.";
    }
} else {
    // If the form is not submitted via POST method, handle the error
    echo "Invalid request.";
}
?>
