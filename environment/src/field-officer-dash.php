<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Field Officer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navigation.php'; ?>
  <div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto">
      <h1 class="text-3xl font-semibold text-gray-900 mb-8">Field Officer Dashboard</h1>
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
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

              $sql = "SELECT * FROM complaints"; // Using 'complaints' table from the database
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
      <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Update Complaint Status</h2>
        <div class="flex gap-4 items-center">
          <input class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-32" placeholder="Report ID" id="reportID">
          <div class="relative inline-block text-left">
            <button type="button" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="statusDropdown">
              <span id="selectedStatus">Select Status</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 opacity-50" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
            </button>
            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" id="statusOptions" style="display: none;">
              <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="statusDropdown">
                <button class="block text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none" role="menuitem">Pending</button>
                <button class="block text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none" role="menuitem">Invalid</button>
                <button class="block text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none" role="menuitem">Investigating</button>
                <button class="block text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none" role="menuitem">Complete</button>
              </div>
            </div>
          </div>
          <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2" id="updateStatusBtn">Update Status</button>
        </div>
      </div>
      <div class="mt-8">
      <form id="sendMessageForm">
        <textarea name="message" id="message" class="flex min-h-[80px] rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" placeholder="Message"></textarea>
        <input type="text" name="reportID" id="reportID" class="hidden">
        <input type="hidden" name="status" id="selectedStatus" value="">
        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 mt-4">Send Message</button>
      </form>
    </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script>
    // JavaScript for dropdown functionality
    const statusDropdown = document.getElementById('statusDropdown');
    const statusOptions = document.getElementById('statusOptions');
    const selectedStatus = document.getElementById('selectedStatus');
    const reportIDField = document.getElementById('reportID');
    const updateStatusBtn = document.getElementById('updateStatusBtn');

    statusDropdown.addEventListener('click', () => {
      statusOptions.style.display = statusOptions.style.display === 'none' ? 'block' : 'none';
    });

    const statusButtons = statusOptions.getElementsByTagName('button');
    Array.from(statusButtons).forEach(button => {
      button.addEventListener('click', () => {
        selectedStatus.textContent = button.textContent;
        statusOptions.style.display = 'none';
      });
    });

    updateStatusBtn.addEventListener('click', () => {
      const reportID = reportIDField.value;
      const status = selectedStatus.textContent;

      // AJAX request to update status
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'update_status.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Refresh table on success
          location.reload();
        }
      };
      xhr.send(`reportID=${reportID}&status=${status}`);
    });
    document.addEventListener("DOMContentLoaded", function () {
  const sendMessageForm = document.getElementById("sendMessageForm");

  sendMessageForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const reportID = document.getElementById("reportID").value;
    const message = document.getElementById("message").value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send_email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          // Email sent successfully
          alert("Email sent successfully.");
        } else {
          // Error sending email
          alert("Failed to send email. Please try again.");
        }
      }
    };
    xhr.send("reportID=" + encodeURIComponent(reportID) + "&message=" + encodeURIComponent(message));
  });
});

  </script>
</body>
</html>