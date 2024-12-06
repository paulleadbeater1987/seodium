<?php
require('config/config.php');
require('config/db.php');

$message = ''; // Initialize message variable

// Only process the form if it's submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Capture form data and sanitize
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['dateofbirth']); // Updated to match database column

    // Validate inputs
    if (empty($name) || empty($email) || empty($date_of_birth)) {
        $message = "Please fill in all fields.";
    } else {
        // Call function to handle insertion and validation
        $message = insertUser($conn, $name, $email, $date_of_birth);
    }
}

// Function to insert user into the database
function insertUser($conn, $name, $email, $date_of_birth) {
    // Check if the email already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        return "This email is already registered.";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (name, email, date_of_birth) VALUES ('$name', '$email', '$date_of_birth')"; // Updated column name
        if (mysqli_query($conn, $insertQuery)) {
            return "User added successfully!";
        } else {
            return "Error: " . mysqli_error($conn);
        }
    }
}

// Fetch users for the raffle logic
$query = 'SELECT * FROM users';
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>