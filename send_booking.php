<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $datetime = htmlspecialchars($_POST['datetime']);
    $destination = htmlspecialchars($_POST['destination']);
    $persons = htmlspecialchars($_POST['persons']);
    $category = htmlspecialchars($_POST['categories']); // Fixed mismatch
    $message = htmlspecialchars($_POST['message']);

    $to = "reservation@chaguaadventure.com";
    $subject = "New Tour Booking";
    $body = "You have received a new booking request:\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Date & Time: $datetime\n".
            "Destination: $destination\n".
            "Persons: $persons\n".
            "Category: $category\n".
            "Special Request: $message\n";

    $headers = "From: noreply@chaguaadventures.com\r\n"; // Use a fixed email to avoid spam filtering
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your booking request has been sent successfully.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>
