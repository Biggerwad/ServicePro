<?php include '../includes/header.php'; ?>

<h2>Contact Us</h2>
<form action="process.php" method="POST">
    <label for="name"> Name: </label> <br>
    <input type="text" name="name" placeholder="Your Name is important" required> <br>

    <label for="email">Email: </label> <br>
    <input type="email" name="email" placeholder="Your Email" required> 

    <label for="message">Your Message: </label> <br>
    <textarea name="message" placeholder="Yoru Message for us" required>

    </textarea> <br>
    <button type="submit"> Send Message </button>
</form>

<?php include '../includes/footer.php'; ?>