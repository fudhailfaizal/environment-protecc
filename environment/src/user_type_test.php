<?php
    if (isset($_SESSION['user_type'])) {
        echo "<p>User Type: {$_SESSION['user_type']}</p>";
    } else {
        echo "<p>User Type not set</p>";
    }
    ?>