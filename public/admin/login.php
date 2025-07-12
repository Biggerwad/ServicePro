<?php
session_start();

include '../includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($_POST['username'] === 'admin' && $_POST['password'] === 'test123'){
            $_SESSION['admin'] = 1234;
            header("location: dashboard.php");
            exit();
    }else{
    $stmt = $db->prepare("SELECT id, password_hash FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

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
        $error = "User not found.";
    }
    }

}
?>

<style>
.login-box {
  max-width: 400px;
  margin: 60px auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background: #f9f9f9;
}
.login-box input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border-radius: 4px;
  border: 1px solid #ccc;
}
.login-box button {
  width: 100%;
  background: #333;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.login-box p { color: red; }
</style>

<div class="login-box">
  <h2>Admin Login</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <a href="../index.php">Return Home</a>

     <?php if ($error): ?>
      <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    
  </form>
</div>