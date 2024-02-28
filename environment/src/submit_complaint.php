<?php
include 'db_connection.php'; // Include the database connection script

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $complainer = $_POST['complainer'];
    $email = $_POST['email'];
    $report_address = $_POST['report-address'];
    $report_city = $_POST['report-city'];
    $report_zip = $_POST['report-zip'];
    $institution = $_POST['institution'];
    $violation_active = $_POST['violation_active'];
    $incident_date = $_POST['incident-date'];
    $emergency = $_POST['emergency'];
    $intention = $_POST['intention'];
    $violation_method = $_POST['violation-method'];
    $affected_subjects = $_POST['affected-subjects'];
    $description = $_POST['description'];
    // Add other form fields similarly

    // Insert data into database
    // Insert data into database
    $sql = "INSERT INTO complaints (complainer, email, report_address, report_city, report_zip, institution, violation_active, incident_date, emergency, intention, violation_method, affected_subjects, description, status) VALUES ('$complainer', '$email', '$report_address', '$report_city', '$report_zip', '$institution', '$violation_active', '$incident_date', '$emergency', '$intention', '$violation_method', '$affected_subjects', '$description', 'Pending')";
    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection (moved to db_connection.php)
//$conn->close();
?>
