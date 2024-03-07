<?php
// Debugging output to display form data
foreach ($_POST as $key => $value) {
    echo "$key: $value<br>";
}


session_start();
include 'db_connection.php'; // Include the database connection script

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debugging output to display form data
echo "<pre>";
print_r($_POST);
echo "</pre>";


// Initialize email variable
$email = "";

// Check if the email parameter exists in the session
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Extract email from session
} else {
    // If email parameter is not provided in the session, check if it's in the URL
    if(isset($_GET['email'])) {
        $email = $_GET['email']; // Extract email from URL
    } else {
        // If email parameter is not provided in the session or the URL, handle the error
        echo "Error: Email parameter not found in session or URL";
        exit(); // Stop script execution
    }
}

// Echo the extracted email
echo "Email extracted: $email <br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve other form data
    $complainer = $_POST['complainer'];
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

    // SQL query to insert complaint into database
    $sql = "INSERT INTO complaints (complainer, email, report_address, report_city, report_zip, institution, violation_active, incident_date, emergency, intention, violation_method, affected_subjects, description, status) VALUES ('$complainer', '$email', '$report_address', '$report_city', '$report_zip', '$institution', '$violation_active', '$incident_date', '$emergency', '$intention', '$violation_method', '$affected_subjects', '$description', 'Pending')";

    // Execute query
        if ($conn->query($sql) === TRUE) {
            // Complaint submitted successfully, set success message
            $_SESSION['status'] = "Complaint submitted successfully";
            $_SESSION['alert_type'] = "success";
        } else {
            // Error occurred, set error message
            $_SESSION['status'] = "Error: " . $conn->error;
            $_SESSION['alert_type'] = "danger";
            echo "SQL Error: " . $conn->error;
        }

    
    // Redirect back to the complaint submission form
    header("Location: create-complaint.php");
    exit();
}
?>
