<?php include 'access.php';?>
<?php include 'header.php';?>
  <title>Create Complaint!</title>
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
  <div class="flex bg-white rounded-lg shadow-md p-4 flex-wrap">
    <div class="w-full md:w-1/3 pr-2">
      <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
      <form id="complaintForm" class="grid grid-cols-1 gap-4" method="post" action="submit_complaint.php">
        <div class="mb-4">
          <label for="complainer" class="block text-sm font-medium mb-2">Complainer:</label>
          <input name="complainer" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="complainer" placeholder="Full Name" required>
        </div>
        <input name="email" type="hidden" value="<?php echo $_GET['email']; ?>">
        <div class="mb-4">
          <label for="report-address" class="block text-sm font-medium mb-2">Report Address:</label>
          <input name="report-address" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="report-address" placeholder="Address of the Incident">
        </div>
        <div class="mb-4">
          <label for="report-city" class="block text-sm font-medium mb-2">Report City:</label>
          <input name="report-city" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="report-city" placeholder="City">
        </div>
        <div class="mb-4">
          <label for="report-zip" class="block text-sm font-medium mb-2">Report Zip:</label>
          <input name="report-zip" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="report-zip" placeholder="Postal Code">
        </div>
      </div>
      <div class="w-full md:w-1/3 pr-2">
        <h2 class="text-xl font-semibold mb-4">Incident Details</h2>
        <div class="mb-4">
          <label for="institution" class="block text-sm font-medium mb-2">Institution:</label>
          <select name="institution" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="institution" required>
            <option value=""></option>
            <option value="wildlife-conservation">Wildlife Conservation</option>
            <option value="environmental-protection">Environmental Protection</option>
            <option value="forest-service">Forest Service</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="violation-active" class="block text-sm font-medium mb-2">Violation Active:</label>
          <select name="violation_active" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="violation-active" required>
            <option value=""></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="incident-date" class="block text-sm font-medium mb-2">Incident Date:</label>
          <input name="incident-date" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="incident-date" type="date">
        </div>
      </div>
      <div class="w-full md:w-1/3 pr-2">
        <h2 class="text-xl font-semibold mb-4">Additional Information</h2>
        <div class="mb-4">
          <label for="emergency" class="block text-sm font-medium mb-2">Emergency:</label>
          <select name="emergency" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="emergency">
            <option value=""></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="intention" class="block text-sm font-medium mb-2">Intention:</label>
          <select name="intention" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="intention">
            <option value=""></option>
            <option value="accident">Accident</option>
            <option value="intentional">Intentional</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="violation-method" class="block text-sm font-medium mb-2">Violation Method:</label>
          <select name="violation-method" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="violation-method">
            <option value=""></option>
            <option value="chemical">Chemical</option>
            <option value="physical">Physical</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="affected-subjects" class="block text-sm font-medium mb-2">Affected Subjects:</label>
          <input name="affected-subjects" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="affected-subjects" placeholder="Subjects affected by the incident">
        </div>
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium mb-2">Description:</label>
          <textarea name="description" class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="description" placeholder="Detailed description of the incident"></textarea>
        </div>
        <div class="mb-4">
          <label for="media-upload" class="block text-sm font-medium mb-2">Media Upload (Image or Video):</label>
          <input name="media-upload" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="media-upload" type="file">
        </div>
        <div class="flex justify-end">
          <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-green-500 hover:bg-green-600 text-white h-10 px-4 py-2">Submit Complaint</button>
        </div>
      </form>
    </div>
  </div>
  <div id="successMessage" style="display: none;">Complaint submitted successfully!</div>


  <?php include 'footer.php'; ?>

  <script>
    // JavaScript to show success message on form submission
    document.addEventListener("DOMContentLoaded", function() {
      const complaintForm = document.getElementById('complaintForm');
      const successMessage = document.getElementById('successMessage');

      complaintForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        // Here you can add additional validation if needed before showing the success message

        // Display the success message
        successMessage.style.display = 'block';

        // Optional: Reset the form fields after submission
        complaintForm.reset();

        // Hide the success message after 3 seconds
        setTimeout(function() {
          successMessage.style.display = 'none';
        }, 3000);
      });
    });
  </script>
</body>
</html>