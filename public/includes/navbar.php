<style>
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  background: #333;
  color: white;
}
.navbar h1 { font-size: 20px; }
.navbar ul {
  list-style: none;
  display: flex;
  gap: 20px;
}
.navbar ul li a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}
.menu-toggle {
  display: none;
  cursor: pointer;
  font-size: 24px;
}
@media (max-width: 768px) {
  .navbar ul {
    display: none;
    flex-direction: column;
    background: #444;
    width: 100%;
    position: absolute;
    top: 60px;
    left: 0;
  }
  .navbar ul.show {
    padding: 1rem 0;
    display: flex;
  }
  .menu-toggle {
    display: block;
  }
}
</style>


<div class="navbar">
  <h1><a href="index.php">ServicePro</a></h1>
  <div class="menu-toggle" onclick="toggleMenu()">☰</div>

  <ul id="nav-menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="services.php">Services</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="admin/login.php">Admin</a></li>
  </ul>
</div>


<script>
function toggleMenu() {
  document.getElementById('nav-menu').classList.toggle('show');
}
</script>