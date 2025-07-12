<?php
include 'includes/db.php';

$stmt = $db->query("SELECT * FROM qualities");
$qualities = [];

if ($stmt && $stmt->num_rows > 0) {
  while ($row = $stmt->fetch_assoc()) {
    $qualities[] = $row;
  }
} else {
  $qualities = [
    ["title" => "Reliable", "description" => "We always show up.", "icon" => "https://cdn-icons-png.flaticon.com/512/190/190411.png"],
    ["title" => "Affordable", "description" => "Top service at low cost.", "icon" => "https://cdn-icons-png.flaticon.com/512/3135/3135715.png"],
    ["title" => "Experienced", "description" => "10+ years of excellence.", "icon" => "https://cdn-icons-png.flaticon.com/512/860/860724.png"]
  ];
}
?>

<div class="carousel-wrapper">
  <div class="carousel-track">
    <?php foreach($qualities as $q): ?>
      <div class="carousel-slide">
        <img src="<?= htmlspecialchars($q['icon']) ?>" alt="<?= htmlspecialchars($q['title']) ?>">
        <h3><?= htmlspecialchars($q['title']) ?></h3>
        <p><?= htmlspecialchars($q['description']) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</div>
