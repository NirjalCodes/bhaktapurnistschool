<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Store the email in a text file
    $file = 'subscribers.txt';
    $current = file_get_contents($file);
    $current .= $email . "\n";
    file_put_contents($file, $current);

    echo "Thank you for subscribing!";
} else {
    // If the form is not submitted, redirect back to the newsletter page
    header("Location: hi.html");
    exit;
}
?>
