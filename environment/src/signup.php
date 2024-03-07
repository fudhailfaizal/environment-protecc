<?php
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $password = $_POST['password'];

    $userType = "default user";

    // SQL query to insert new user into database
    $sql = "INSERT INTO Users (name, email, city, user_type, password) VALUES ('$name', '$email', '$city', '$userType', '$password')";

    if ($conn->query($sql) === TRUE) {
        // New user added successfully
        $_SESSION['status'] = "Account created successfully!";
        $_SESSION['alert_type'] = "success";
        header("Location: index.php");
    } else {
        // Error occurred
        $_SESSION['status'] = "Account creation failed: " . $conn->error;
        $_SESSION['alert_type'] = "danger";
    }
}
?>
