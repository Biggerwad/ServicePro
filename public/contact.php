<?php include '../includes/header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $msg = "Dear {$name}, \n Thank you for contacting ServicePro \n Please let us know how we can be of service to you today, 
    we will be at your service as soon as possible. \n Kindly find your message below \n {$message} \n \nThank you, \n The ServicePro Team";

    $msg = wordwrap($msg,70);
    
    $header = "From: ServicePro@gmail.service.com";

    if (mail($email, "ServicePro - Thank you for Contacting Us", $msg, $header)) {
    echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
}

?>
<style>
    
.lds-grid,
.lds-grid div {
  box-sizing: border-box;
}
.lds-grid {
  display: none;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-grid div {
  position: absolute;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: currentColor;
  animation: lds-grid 1.2s linear infinite;
}
.lds-grid div:nth-child(1) {
  top: 8px;
  left: 8px;
  animation-delay: 0s;
}
.lds-grid div:nth-child(2) {
  top: 8px;
  left: 32px;
  animation-delay: -0.4s;
}
.lds-grid div:nth-child(3) {
  top: 8px;
  left: 56px;
  animation-delay: -0.8s;
}
.lds-grid div:nth-child(4) {
  top: 32px;
  left: 8px;
  animation-delay: -0.4s;
}
.lds-grid div:nth-child(5) {
  top: 32px;
  left: 32px;
  animation-delay: -0.8s;
}
.lds-grid div:nth-child(6) {
  top: 32px;
  left: 56px;
  animation-delay: -1.2s;
}
.lds-grid div:nth-child(7) {
  top: 56px;
  left: 8px;
  animation-delay: -0.8s;
}
.lds-grid div:nth-child(8) {
  top: 56px;
  left: 32px;
  animation-delay: -1.2s;
}
.lds-grid div:nth-child(9) {
  top: 56px;
  left: 56px;
  animation-delay: -1.6s;
}
@keyframes lds-grid {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}
</style>

<script>
        function showSpinner() {
            document.getElementById('lds-grid').style.display = 'block';
        }
</script>

<div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<h2>Contact Us</h2>
<form action="process.php" method="POST" onsubmit="showSpinner()">
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