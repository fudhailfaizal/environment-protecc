<?php
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $password = $_POST['password'];

    // SQL query to insert new user into database
    $sql = "INSERT INTO Users (name, email, city, password) VALUES ('$name', '$email', '$city', '$password')";

    if ($conn->query($sql) === TRUE) {
        // New user added successfully, redirect to sign-in page or perform other actions
        header("Location: admin-dash.php");
    } else {
        // Error occurred, handle error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
