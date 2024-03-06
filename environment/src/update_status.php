<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reportID']) && isset($_POST['status'])) {
    // Database configuration
    $servername = "localhost"; // Change this to your database server name
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "environment"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape variables for security
    $reportID = $conn->real_escape_string($_POST['reportID']);
    $status = $conn->real_escape_string($_POST['status']);

    // Update status in the database
    $sql = "UPDATE complaints SET status='$status' WHERE id='$reportID'";
    if ($conn->query($sql) === TRUE) {
        // Status updated successfully
        $_SESSION['status'] = "Status updated successfully";
        $_SESSION['alert_type'] = "success";
        http_response_code(200);
        exit();
    } else {
        // Error updating status
        $_SESSION['status'] = "Error updating status: " . $conn->error;
        $_SESSION['alert_type'] = "danger";
        http_response_code(500);
        exit();
    }

    $conn->close();
} else {
    // Invalid request
    http_response_code(400);
    exit();
}
?>
