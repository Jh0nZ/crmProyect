<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the POST data
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $age = isset($_POST["age"]) ? $_POST["age"] : "";

    // Display the received values
    echo "Received data:\n";
    echo "Name: $name\n";
    echo "Age: $age\n";
} else {
    // If the request method is not POST, display an error
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method. Only POST requests are allowed.";
}
?>
