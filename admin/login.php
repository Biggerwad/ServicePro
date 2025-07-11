<?php

session_start();

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT id, password_hash FROM admins WHERE username = ?");
    $stmt -> bind_params("s", $username);
    $stmt-> execute();
    $stmt-> store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password_hash);
        $stmt->fetch();

        if (password_verify($password, $password_hash)){
            $_SESSION['admin'] = $id;
            header("location: dashboard.php");
            exit();
        } else {
            $error = "Invalid Password.";
        }
    } else {
        $error = "User not found."
    }
}
?>

