<?php
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $password = $_POST['password'];

    // Set default user type
    $userType = "default user";

    // SQL query to insert new user into database with default user type
    $sql = "INSERT INTO Users (name, email, city, user_type, password) VALUES ('$name', '$email', '$city', '$userType', '$password')";

    if ($conn->query($sql) === TRUE) {
        // New user added successfully, redirect to sign-in page or perform other actions
        header("Location: admin-dash.php");
    } else {
        // Error occurred, handle error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
