<?php
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $userType = trim($_POST['user_type']);
    $password = $_POST['password'];

    // SQL query to update user data in the database
    $sql = "UPDATE Users SET name='$name', email='$email', city='$city', user_type='$userType', password='$password' WHERE id=".$_POST['id'];

    if ($conn->query($sql) === TRUE) {
        // User data updated successfully
        echo "User data updated successfully";
    } else {
        // Error occurred, handle error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
