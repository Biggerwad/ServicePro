<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .dashboard { max-width: 800px; margin: auto; text-align: center; }
        .dashboard a { display: inline-block; margin: 10px; padding: 10px 20px; background: #333; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Welcome Admin</h1>
        <a href='manage-testimonials.php'>Manage Testimonials</a>
        <a href='logout.php'>Logout</a>
    </div>
</body>
</html>