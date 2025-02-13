<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contact_information = htmlspecialchars($_POST['contact_information']);
    $message = htmlspecialchars($_POST['message']);

    if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $email_from = 'salonisah0@gmail.com';
    $email_subject = 'New Form Submission';
    $email_body = "User Name: $name.\n".
                  "User Email: $visitor_email.\n".
                  "Contact Information: $contact_information.\n".
                  "User Message: $message.\n";

    $to = 'salonisah@gmail.com';
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: contact.html");
        exit();
    } else {
        echo "Email sending failed.";
    }
}
?>
