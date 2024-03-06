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
        $_SESSION['status'] = "User data updated successfully";
        $_SESSION['alert_type'] = "success";
        header("Location: admin-dash.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Error occurred, handle error
        $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['alert_type'] = "danger";
        header("Location: admin-dash.php"); // Redirect to admin dashboard
        exit();
    }
}
?>
