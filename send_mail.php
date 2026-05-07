<?php
// Simple mail function for contact form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ini_set('SMTP', 'smtp.gmail.com');
    // Get form data
    $name = htmlspecialchars($_POST['contact_name'] ?? '');
    $email = htmlspecialchars($_POST['contact_email'] ?? '');
    $message = htmlspecialchars($_POST['contact_message'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill all required fields.");
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email address.");
    }
// the message
$msg = "First line of textnSecond line of text";

// use wordwrap() if lines are longer than 70 characters

// send email

    // Email details
    $to = "ayu846142@gmail.com"; // Your email address
    $subject = "New Contact Form Message from $name";
    
    // Email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n\n";
    $email_body .= "Message:\n$message\n";
    
    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send email
    if (mail("developerphp84@gmail.com","My subject",$msg)) {
        // Success - redirect back with success message
        header("Location: index.html?status=success");
        exit();
    } else {
        // Error - redirect back with error message
        header("Location: index.html?status=error");
        exit();
    }
} else {
    // Not a POST request
    header("Location: index.html");
    exit();
}
?>
