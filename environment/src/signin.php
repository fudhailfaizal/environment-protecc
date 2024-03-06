<?php
session_start(); // Start session
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $password = $_POST['password'];

    // SQL query to check if user exists
    $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, set session variables
        $user = $result->fetch_assoc();
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_type'] = $user['user_type']; // Assuming the email is stored in the 'email' column
        
        // Redirect users based on their roles
        if ($user['user_type'] == 'admin') {
            header("Location: admin-dash.php");
            exit();
        } elseif ($user['user_type'] == 'field officer') {
            header("Location: field-officer-dash.php");
            exit();
        } else {
            // For default users, redirect to authenticated page
            $_SESSION['status'] = "Login successful!";
            $_SESSION['alert_type'] = "success";
            header("Location: authenticated.php");
            exit();
        }
    } else {
        // User does not exist, handle error
        $_SESSION['status'] = "Invalid username or password";
        $_SESSION['alert_type'] = "danger";
        header("Location: index.php");
        exit();
    }
}
?>
