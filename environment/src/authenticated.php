<?php
if (!isset($_SESSION)) {
    session_start(); // Start session if not already started
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Authenticated</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    html, body {
      height: 100%;
    }
    .container {
      margin-left: auto;
      margin-right: auto;
      max-width: 1200px; /* Adjust as needed */
      padding-left: 20px;
      padding-right: 20px;
    }
    footer {
      margin-top: auto;
      background-color: #f9f9f9;
      padding: 20px 0;
      text-align: center;
    }
  </style>
</head>
<body class="flex flex-col min-h-screen">
<nav class="bg-white px-4 py-2 flex justify-between items-center">
    <!-- Navigation links -->
    <div class="flex items-center space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 h-6 w-6">
        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
        <line x1="4" x2="4" y1="22" y2="15"></line>
      </svg>
      <a class="text-gray-700 hover:text-gray-900" href="#">About Us</a>
      <a class="text-gray-700 hover:text-gray-900" href="#">Meet The Team</a>
      <a class="text-gray-700 hover:text-gray-900" href="#">Our Projects</a>
      <a class="text-gray-700 hover:text-gray-900" href="#">Contact Us</a>
    </div>
    
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

  <div class="container mx-auto px-4 md:px-6 mt-8">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
      <div class="text-center lg:text-left">
        <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl lg:text-7xl/none">
          Lodge a Complaint
        </h1>
        <p class="max-w-[600px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed mx-auto dark:text-gray-400 mt-4">
          Report environmental issues in your area. Your voice can help protect our planet.
        </p>
      </div>
      <div class="text-right">
        <a href="create-complaint.php" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">Submit Complaint</a>
      </div>
    </div>
    <div class="py-12 lg:py-24">
      <div class="container mx-auto px-4 md:px-6">
      <?php
if (!isset($_SESSION)) {
    session_start(); // Start session if not already started
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "environment";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (isset($_SESSION['email'])) {
    // Retrieve email from session
    $email = $_SESSION['email'];

    // Fetching user's complaints
    $sql = "SELECT * FROM complaints WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            echo "<div class='overflow-auto border border-gray-200 rounded-lg dark:border-gray-800'>";
            echo "<table class='min-w-full'>";
            echo "<thead>";
            echo "<tr class='border-b border-gray-200 dark:border-gray-800'>";
            echo "<th class='px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400'>Date</th>";
            echo "<th class='px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400'>Location</th>";
            echo "<th class='px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400'>Issue</th>";
            echo "<th class='px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400'>Status</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody class='divide-y divide-gray-200 dark:divide-gray-800'>";
            while($row = $result->fetch_assoc()) {
                echo "<tr class='hover:bg-gray-50 dark:hover:bg-gray-950'>";
                echo "<td class='px-4 py-3 text-sm text-gray-900'>" . $row["incident_date"] . "</td>";
                echo "<td class='px-4 py-3 text-sm text-gray-900'>" . $row["report_address"] . ", " . $row["report_city"] . "</td>";
                echo "<td class='px-4 py-3 text-sm text-gray-900'>" . $row["description"] . "</td>";
                echo "<td class='px-4 py-3 text-sm text-gray-900'>" . $row["status"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p class='text-center text-xl font-semibold'>No complaints yet.</p>";
            echo "<div class='flex justify-center mt-4'>";
            echo "<a href='create-complaint.php' class='inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow'>Make Your First Complaint</a>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-center text-xl font-semibold'>Error fetching complaints.</p>";
    }
} else {
    header("Location: sign-in.php"); // Redirect to sign-in page if not logged in
    exit();
}

// Close connection
$conn->close();
?>

      </div>
    </div>
  </div>
  <footer class="border-t mt-auto">
    <div class="container flex flex-col md:flex-row items-center justify-between py-4 space-y-4 md:space-y-0">
      <nav class="flex flex-col md:flex-row gap-4 md:gap-8">
        <a class="font-medium" href="#">
          About Us
        </a>
        <a class="font-medium" href="#">
          Meet The Team
        </a>
        <a class="font-medium" href="#">
          Our Projects
        </a>
        <a class="font-medium" href="#">
          Contact Us
        </a>
      </nav>
      <nav class="flex flex-col md:flex-row gap-4 md:gap-8">
        <a class="font-medium" href="#">
          Terms
        </a>
        <a class="font-medium" href="#">
          Privacy
        </a>
        <a class="font-medium" href="#">
          Contact
        </a>
      </nav>
      <p class="text-sm text-gray-500 dark:text-gray-400 sm:order-first">
        Copyright © 2023 Enviro Inc. All rights reserved.
      </p>
    </div>
  </footer>
</body>
</html>
