<?php
session_start(); // Start session
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $password = $_POST['password'];

    // SQL query to check if user exists
    $sql = "SELECT * FROM Users WHERE name='$name' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, set session variables
        $user = $result->fetch_assoc();
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email']; // Assuming the email is stored in the 'email' column
        // Redirect to authenticated page
        header("Location: authenticated.php");
        exit();
    } else {
        // User does not exist, handle error
        echo "Invalid username or password";
    }
}
?>
