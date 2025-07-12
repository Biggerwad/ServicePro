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


<h2>Add Testimonial</h2>
<form method="post">
    <label for="text">Name:</label>
    <input type="text" name="name" placeholder="Name" required>
    <label for="service">Service:</label>
    <input type="text" name="service" placeholder="Service" required>
    <label for="message">Message:</label>
    <textarea name="message" placeholder="Message" required></textarea>
    <button type="submit" name="add">Add</button>
</form>


<h2>All Testimonials</h2>
<table border="1">
<tr><th>Name</th><th>Service</th><th>Message</th><th>Action</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['service']) ?></td>
    <td><?= htmlspecialchars($row['message']) ?></td>
    <td><a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this testimonial?')">Delete</a></td>
</tr>
<?php endwhile; ?>
</table>

<?php $db->close(); ?>