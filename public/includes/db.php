<?php
// Attempt to connect to MySQL, but fail gracefully if not available
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'servicepro';

$db = null;

try {
    $db = new mysqli($host, $user, $pass, $dbname);
    if ($db->connect_error) {
        throw new Exception("Database not available.");
    }
} catch (Exception $e) {
    // Log for debugging in future
    error_log("DB connection failed: " . $e->getMessage());
    $db = null; // Use null to represent fallback mode
}
?>
