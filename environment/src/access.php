<?php
// Check if session is not already started before starting it
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define access control logic
$accessControl = [
    'authenticated.php' => ['default user', 'field officer', 'admin'],
    'create-complaint.php' => ['default user', 'field officer', 'admin'],
    'field-officer-dash.php' => ['field officer', 'admin'],
    'admin-dash.php' => ['admin'],
    'individual.php' => ['admin']
];

// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);

// Check if the user is logged in
if (!isset($_SESSION['user_type'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

// Check if the current user type is allowed for the current page
if (!in_array($_SESSION['user_type'], $accessControl[$current_page]) && !in_array('all', $accessControl[$current_page])) {
    // Redirect to appropriate page based on user type
    if ($_SESSION['user_type'] == 'default user') {
        header("Location: authenticated.php");
    } elseif ($_SESSION['user_type'] == 'field officer') {
        header("Location: field-officer-dash.php");
    } elseif ($_SESSION['user_type'] == 'admin') {
        header("Location: admin-dash.php");
    }
    exit();
}
?>
