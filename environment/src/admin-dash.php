<?php include 'access.php';?>
<?php include 'header.php';?>
  <title>Welcome Admin</title>
  <style>
        /* Custom styles */
        html,
        body {
            height: 100%;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
            max-width: 1200px;
            /* Adjust as needed */
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

        /* Overlay styles */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            backdrop-filter: blur(8px); /* Apply blur effect */
            -webkit-backdrop-filter: blur(8px); /* For Safari */
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 1.0); /* Semi-transparent white */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<?php
if(isset($_SESSION['status'])) {
    $alert_type = isset($_SESSION['alert_type']) ? $_SESSION['alert_type'] : "success";
?>
<div class="alert alert-<?php echo $alert_type; ?> alert-dismissible fade show" role="alert">
    <strong><?php echo ($alert_type == "success") ? "Success!" : "Error!"; ?></strong> <?php echo $_SESSION['status']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['status']);
unset($_SESSION['alert_type']);
}
?>


<div class="bg-white p-6 rounded-lg shadow-lg">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold text-gray-700">User Details</h2>
    <a href="#" onclick="showOverlay('signUpOverlay')" class="inline-flex items-center justify-center whitespace-nowrap text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add User</a>
  </div>
  <!-- Add User Overlay -->
  <div id="signUpOverlay" class="overlay">
        <div class="overlay-content">
            <button class="absolute top-4 right-4 text-gray-700 hover:text-gray-900" onclick="hideOverlay('signUpOverlay')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <h1 class="text-center text-2xl font-bold text-gray-800 mb-4">Add User</h1>
            <form class="space-y-6" action="add_user.php" method="post">
                <div>
                    <label for="signUpName" class="sr-only">Name</label>
                    <input name="name" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpName" placeholder="Name" type="text" fdprocessedid="drtkc">
                </div>
                <div>
                    <label for="signUpEmail" class="sr-only">Email</label>
                    <input name="email" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpEmail" placeholder="Email" type="email" fdprocessedid="57hie">
                </div>
                <div>
                    <label for="signUpCity" class="sr-only">City</label>
                    <input name="city" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpCity" placeholder="City" type="text" fdprocessedid="j9hbye">
                </div>
                <div>
                    <label for="signUpPassword" class="sr-only">Password</label>
                    <input name="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpPassword" placeholder="Password" type="password" fdprocessedid="6n6gq">
                </div>
                <div>
                    <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-white text-green-600" fdprocessedid="r7gs1e">ADD</button>
                </div>
            </form>
            
        </div>
    </div>
  <div class="relative w-full overflow-auto">
    <table id="userTable" class="w-full caption-bottom text-sm">
      <!-- Table headers -->
      <thead class="[&amp;_tr]:border-b">
        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">User ID</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Name</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Email</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">City</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">User Type</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Password</th>
          <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Action</th>
        </tr>
      </thead>
      <!-- Table body -->
      <tbody class="[&amp;_tr:last-child]:border-0">
      <?php
include 'db_connection.php'; // Include the database connection script

$sql = "SELECT * FROM users"; // Using 'users' table from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr class='border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted'>";
    echo "<form action='edit_user.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
    echo "<td class='p-4 align-middle'>" . $row["id"] . "</td>";
    echo "<td class='p-4 align-middle'><input type='text' name='name' value='" . $row["name"] . "' class='flex h-10 w-full rounded-md border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border focus:border-blue-500 bg-transparent'></td>";
    echo "<td class='p-4 align-middle'><input type='text' name='email' value='" . $row["email"] . "' class='flex h-10 w-full rounded-md border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border focus:border-blue-500 bg-transparent'></td>";
    echo "<td class='p-4 align-middle'><input type='text' name='city' value='" . $row["city"] . "' class='flex h-10 w-full rounded-md border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border focus:border-blue-500 bg-transparent'></td>";
    echo "<td class='p-4 align-middle'><select name='user_type' class='flex h-10 w-full rounded-md border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border focus:border-blue-500 bg-transparent'><option value='default user' " . ($row["user_type"] == "default user" ? "selected" : "") . ">Default User</option><option value='field officer' " . ($row["user_type"] == "field officer" ? "selected" : "") . ">Field Officer</option><option value='admin' " . ($row["user_type"] == "admin" ? "selected" : "") . ">Admin</option></select></td>";
    echo "<td class='p-4 align-middle'><input type='text' name='password' value='" . $row["password"] . "' class='flex h-10 w-full rounded-md border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border focus:border-blue-500 bg-transparent'></td>";
    echo "<td class='p-4 align-middle flex justify-around'>";
    echo "<button type='submit' title='Save' class='inline-flex items-center justify-center ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 w-10 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full mr-2'>S</button>";
    echo "</form>";
    echo "<form action='individual.php' method='get'>";
    echo "<input type='hidden' name='email' value='" . $row["email"] . "'>";
    echo "<button type='submit' title='View' class='inline-flex items-center justify-center ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 w-10 bg-yellow-500 hover:bg-yellow-700 text-white font-bold rounded-full mr-2'>V</button>";
    echo "</form>";
    echo "<form action='delete_user.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
    if ($row["user_type"] !== "admin") {
      echo "<button type='submit' title='Delete' class='inline-flex items-center justify-center ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 w-10 bg-red-500 hover:bg-red-700 text-white font-bold rounded-full' onclick='return confirm(\"Are you sure you want to delete this user?\")'>D</button>";
    } else {
      echo "<button type='button' title='Cannot delete admin role' class='inline-flex items-center justify-center ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 w-10 bg-gray-400 cursor-not-allowed text-white font-bold rounded-full' disabled>D</button>";
    }
    echo "</form>";
    echo "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='6'>No data available</td></tr>";
}
$conn->close();
?>



      </tbody>
    </table>
  </div>
</div>
<?php include 'footer.php'; ?>
<script>
        // JavaScript functions to show/hide overlay
        function showOverlay(overlayId) {
            document.getElementById(overlayId).style.display = "block";
            document.body.style.overflow = "hidden"; // Prevent scrolling when overlay is open
        }

        function hideOverlay(overlayId) {
            document.getElementById(overlayId).style.display = "none";
            document.body.style.overflow = ""; // Restore scrolling
        }
    </script>
</body>
</html>
