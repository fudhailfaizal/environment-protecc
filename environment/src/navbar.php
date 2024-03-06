<?php
// Check if session is not already started before starting it
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define access control logic
$accessControl = [
    'default user' => [
        'Home' => 'authenticated.php',
        'About Us' => '#about-us',
        'Contact Us' => '#contact-us',
        'Create Complaint' => 'create-complaint.php'
    ],
    'field officer' => [
        'Home' => 'authenticated.php',
        'Dashboard' => 'field-officer-dash.php',
        'View Mail' => 'https://mail.google.com/mail/u/0/'
    ],
    'admin' => [
        'Home' => 'authenticated.php',
        'Create Complaint' => 'create-complaint.php',
        'View Mail' => 'https://mail.google.com/mail/u/0/',
        'Manage Users' => 'admin-dash.php',
        'Manage Complaints' => 'field-officer-dash.php'
    ]
];

// Get the current user type
$userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;

// Get the navigation links based on the current user's role
$navLinks = isset($accessControl[$userType]) ? $accessControl[$userType] : [];
?>

<nav class="bg-white px-4 py-2 flex justify-between items-center">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
        <!-- Logo SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 h-6 w-6">
            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
            <line x1="4" x2="4" y1="22" y2="15"></line>
        </svg>

        <!-- Navigation links -->
        <div class="flex items-center space-x-4">
        <?php
        // Output navigation links
        foreach ($navLinks as $label => $url) {
            echo "<a class='text-gray-700 hover:text-gray-900' href='$url'>$label</a>";
        }
        ?>
        </div>
    </div>
    
    <!-- User info and logout button -->
    <div class="flex items-center space-x-2">
    <?php
    if (isset($_SESSION['name'])) {
        echo "<p class='text-gray-700 font-semibold'>Welcome, {$_SESSION['name']}</p>";
        echo "<a href='index.php'><button class='inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-red-500 hover:bg-red-600 text-white'>Logout</button></a>";
    } else {
        header("Location: sign-in.php"); // Redirect to sign-in page if not logged in
        exit();
    }
    ?>
    </div>
</nav>
