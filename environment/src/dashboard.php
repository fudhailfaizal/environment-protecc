<?php
include 'db_connection.php'; // Include the database connection script

// Function to create a new complaint
function createComplaint($complainer, $email, $city, $institution, $violation_date, $emergency, $intention, $affected_subjects, $description) {
    global $conn;
    $sql = "INSERT INTO complaints (complainer, email, city, institution, violation_date, emergency, intention, affected_subjects, description) 
            VALUES ('$complainer', '$email', '$city', '$institution', '$violation_date', '$emergency', '$intention', '$affected_subjects', '$description')";
    return $conn->query($sql);
}

// Function to retrieve all complaints
function getAllComplaints() {
    global $conn;
    $sql = "SELECT * FROM complaints";
    $result = $conn->query($sql);
    $complaints = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $complaints[] = $row;
        }
    }
    return $complaints;
}

// Function to update the status of a complaint
function updateComplaintStatus($complaint_id, $status) {
    global $conn;
    $sql = "UPDATE complaints SET status='$status' WHERE id='$complaint_id'";
    return $conn->query($sql);
}

// Function to communicate with the user
function communicateWithUser($complainer_email, $message) {
    // Add your logic here to send a message to the complainer (e.g., via email)
    // You can use PHP's built-in mail() function or a third-party service
}

// Check if the request method is POST to handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine the action based on the submitted form
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                // Handle create complaint form submission
                $result = createComplaint($_POST['complainer'], $_POST['email'], $_POST['city'], $_POST['institution'], $_POST['violation_date'], $_POST['emergency'], $_POST['intention'], $_POST['affected_subjects'], $_POST['description']);
                if ($result) {
                    // Redirect to dashboard or perform other actions
                    header("Location: dashboard.php");
                } else {
                    echo "Error creating complaint.";
                }
                break;
            case 'update_status':
                // Handle update status form submission
                $result = updateComplaintStatus($_POST['complaint_id'], $_POST['status']);
                if ($result) {
                    // Redirect to dashboard or perform other actions
                    header("Location: dashboard.php");
                } else {
                    echo "Error updating status.";
                }
                break;
            case 'communicate':
                // Handle communication with user form submission
                communicateWithUser($_POST['complainer_email'], $_POST['message']);
                // Optionally, redirect to dashboard or perform other actions
                break;
            default:
                echo "Invalid action.";
                break;
        }
    }
}
?>
