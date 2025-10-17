<?php
$to = "receiver@example.com";
$subject = "Test Email";
$message = "This is a test email from PHP.";
$headers = "From: admin@example.com";

if (mail($to, $subject, $message, $headers))
    echo "Mail sent successfully.";
else
    echo "Mail failed.";
?>

