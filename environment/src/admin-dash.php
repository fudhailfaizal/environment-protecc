<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Welcome Admin</title>
</head>
<body>
<nav class="bg-white px-4 py-2 flex justify-between items-center">
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
    <a href="field-officer-dash.php">
        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-green-500 hover:bg-green-600 text-white">Field Officer</button>
    </a>
    <a href="sign-up.php">
        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-background hover:text-accent-foreground h-10 px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-100">Sign Up</button>
    </a>
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
    echo "<form action='individual.php' method='get'>";
    echo "<input type='hidden' name='email' value='" . $row["email"] . "'>";
    echo "<td class='p-4 align-middle'>" . $row["id"] . "</td>";
    echo "<td class='p-4 align-middle'>" . $row["name"] . "</td>";
    echo "<td class='p-4 align-middle'>" . $row["email"] . "</td>";
    echo "<td class='p-4 align-middle'>" . $row["city"] . "</td>";
    echo "<td class='p-4 align-middle'>" . $row["user_type"] . "</td>";
    echo "<td class='p-4 align-middle'>" . $row["password"] . "</td>";
    echo "<td class='p-4 align-middle'>";
    echo "<button type='submit' class='inline-flex items-center justify-center whitespace-nowrap ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-xs mr-2'>View</button>";
    echo "<button type='submit' class='inline-flex items-center justify-center whitespace-nowrap ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-xs mr-2'>Save</button>";
    echo "</form>";
    echo "<form action='delete_user.php' method='post' class='mt-3'>";
    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
    echo "<button type='submit' class='inline-flex items-center justify-center whitespace-nowrap ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</button>";
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
