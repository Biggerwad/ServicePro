<?php
session_start();

include '../includes/db.php';

if (!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

// CREATE The Testimonial
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])){
    $name = $_POST['name'];
    $service = $_POST['service'];
    $message = $_POST['message'];
    $stmt = $db->prepare("INSERT INTO testimonials (name, service, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $service, $message);
    $stmt->execute();
} 

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $db->query("DELETE FROM testimonials WHERE id = $id");
}

$result = $db->query("SELECT * FROM testimonials");
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial; margin: 20px; }
        .form-box { max-width: 600px; margin: auto; background: #f0f0f0; padding: 20px; border-radius: 10px; }
        .form-box input, .form-box textarea, .form-box button { width: 100%; margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #333; color: white; }
        .action-link { color: red; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Add Testimonial</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="service" placeholder="Service" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <button type="submit" name="add">Add</button>
        </form>
    </div>

    <h2>All Testimonials</h2>
    <table>
        <tr><th>Name</th><th>Service</th><th>Message</th><th>Action</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['service']) ?></td>
            <td><?= htmlspecialchars($row['message']) ?></td>
            <td><a class="action-link" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this testimonial?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $db->close(); ?>