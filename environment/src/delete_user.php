<?php
include 'db_connection.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // SQL query to delete user from the database
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // User deleted successfully
        echo "User deleted successfully";
    } else {
        // Error occurred, handle error
        echo "Error deleting user: " . $conn->error;
    }
} else {
    // Handle invalid request
    echo "Invalid request";
}

$conn->close();
?>
