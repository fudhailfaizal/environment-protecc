<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Welcome Admin</title>
</head>
<body>
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
    .custom-btn {
            background-color: white;
            border: 2px solid #10B981;
            color: #10B981;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-btn:hover {
            background-color: #10B981;
            color: white;
        }
  </style>
<nav class="bg-white px-4 py-2 flex justify-between items-center">
    <!-- Navigation links -->
    <div class="flex items-center space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 h-6 w-6">
        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
        <line x1="4" x2="4" y1="22" y2="15"></line>
      </svg>
      <a class="text-gray-700 hover:text-gray-900" href="field-officer-dash.php">Manage Complaints</a>
      <a class="text-gray-700 hover:text-gray-900" href="#">Database</a>
      <a class="text-gray-700 hover:text-gray-900" href="admin-dash.php">Back to Admin</a>
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
<div class="bg-white p-6 rounded-lg shadow-lg">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold text-gray-700">Complaints By User</h2>
  </div>
  <div class="relative w-full overflow-auto">
    <table class="w-full caption-bottom text-sm">
      <thead class="[&amp;_tr]:border-b">
        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Report ID</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Complainer</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Email</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Report Address</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Report City</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Report ZIP</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Institution</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Violation Active</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Incident Date</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Emergency</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Intention</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Violation Method</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Affected Subjects</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Description</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Media Upload</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Created At</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Status</th>
        </tr>
      </thead>
      <tbody class="[&amp;_tr:last-child]:border-0">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "environment";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve email from URL parameter
        $email = $_GET['email'];

        $sql = "SELECT * FROM complaints WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr class='border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted'>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["id"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["complainer"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["email"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["report_address"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["report_city"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["report_zip"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["institution"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["violation_active"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["incident_date"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["emergency"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["intention"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["violation_method"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["affected_subjects"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["description"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["media_upload"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["created_at"] . "</td>";
            echo "<td class='p-4 align-middle'>&nbsp;" . $row["status"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='17'>No data available</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
