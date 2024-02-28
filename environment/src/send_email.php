<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reportID']) && isset($_POST['message'])) {
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
    $message = $conn->real_escape_string($_POST['message']);

    // Fetch email associated with the report ID
    $sql = "SELECT email FROM complaints WHERE id = '$reportID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $to = $row["email"];

        // Send email
        $subject = "ENVIRO PROTECTION";
        $emailContent = "Report ID: $reportID\n";
        $emailContent .= "Message: $message\n\n";
        $emailContent .= "Thank you for your report";
        $headers = "From: fudhail0410@gmail.com";

        if (mail($to, $subject, $emailContent, $headers)) {
            http_response_code(200);
            exit();
        } else {
            http_response_code(500);
            exit();
        }
    } else {
        // Report ID not found
        http_response_code(404);
        exit();
    }

    $conn->close();
} else {
    // Invalid request
    http_response_code(400);
    exit();
}
?>
