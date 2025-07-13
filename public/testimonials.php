<?php
include 'includes/db.php';

$defaultTestimonials = [
  [
    "message" => "Daniel fixed our house wiring so professionally and quickly. The power hasn't flickered since!",
    "name" => "Mrs. Linda Cole, Homeowner",
    "service" => "Electrical Repairs"
  ],
  [
    "message" => "Our office was spotless after ServicePro's cleaning. Their attention to detail is amazing!",
    "name" => "Joseph Mensah, Small Business Owner",
    "service" => "Office Cleaning"
  ],
  [
    "message" => "My son improved dramatically in math after just two weeks of their tutoring. I'm truly impressed.",
    "name" => "Amina Yusuf, Parent",
    "service" => "Home Tutoring"
  ]
];

$testimonials = $defaultTestimonials;
if ($db){
// fetch data from DB
$stmt = $db->query("SELECT message, name, service FROM testimonials");
if ($stmt && $stmt->num_rows > 0) {
  while ($row = $stmt->fetch_assoc()) {
    // Prepend DB testimonials to show them first
    array_unshift($testimonials, $row);
  }
}}
?>

<section class="testimonials">
  <h2>What Our Clients Are Saying</h2>

  <div class="testimonial-container">
    <?php foreach ($testimonials as $entry): ?>
      <div class="testimonial">
        <p class="message">"<?= htmlspecialchars($entry['message']) ?>"</p>
        <p class="name">— <?= htmlspecialchars($entry['name']) ?></p>
        <p class="service">Service: <?= htmlspecialchars($entry['service']) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>