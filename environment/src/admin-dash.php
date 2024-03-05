<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
  <link rel="stylesheet" href="style.css">
  <title>Welcome Admin</title>
</head>
<body>
<nav class="bg-white px-4 py-2 flex justify-between items-center">
    <!-- Navigation links -->
    <div class="flex items-center space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 h-6 w-6">
        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
        <line x1="4" x2="4" y1="22" y2="15"></line>
      </svg>
      <a class="text-gray-700 hover:text-gray-900" href="field-officer-dash.php">Manage Complaints</a>
      <a class="text-gray-700 hover:text-gray-900" href="#">Database</a>
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
    <h2 class="text-xl font-semibold text-gray-700">User Details</h2>
    <a href="add-user.php" class="inline-flex items-center justify-center whitespace-nowrap text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add User</a>
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
</body>
</html>
