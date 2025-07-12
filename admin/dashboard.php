<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
echo "<h1>Welcome Admin</h1><a href='manage-testimonials.php'>Manage Testimonials</a> | <a href='logout.php'>Logout</a>";
?>