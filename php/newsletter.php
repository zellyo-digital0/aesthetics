<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Check if email is provided
    if (empty($email)) {
        echo "Email address is required.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare email content (for demonstration purposes only)
    $to = 'your_email@gmail.com'; // Replace with your email address
    $subject = 'New Newsletter Subscription';
    $message_body = "New newsletter subscription:\n";
    $message_body .= "Email: $email\n";

    // Set additional email headers
    $headers = "From: Newsletter Subscription <noreply@example.com>";

    // Send email (optional step, usually used to notify admin)
    if (mail($to, $subject, $message_body, $headers)) {
        echo "Thank you for subscribing to our newsletter!";
    } else {
        echo "Failed to subscribe. Please try again later.";
    }
} else {
    // If the form is not submitted via POST method, handle the error
    echo "Invalid request.";
}
?>
