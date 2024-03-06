<?php
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // SQL query to delete user from the database
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // User deleted successfully
        $_SESSION['status'] = "User deleted successfully";
        $_SESSION['alert_type'] = "success";
        header("Location: admin-dash.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Error occurred, handle error
        $_SESSION['status'] = "Error deleting user: " . $conn->error;
        $_SESSION['alert_type'] = "danger";
        header("Location: admin-dash.php"); // Redirect to admin dashboard
        exit();
    }
} else {
    // Handle invalid request
    $_SESSION['status'] = "Invalid request";
    $_SESSION['alert_type'] = "danger";
    header("Location: admin-dash.php"); // Redirect to admin dashboard
    exit();
}

$conn->close();
?>
