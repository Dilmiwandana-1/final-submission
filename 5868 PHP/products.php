<?php
session_start(); 


if (!isset($_SESSION['username'])) {

    header("Location: auth/login.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Brewista Cafe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
        <div class="logo-container">
            <a href="#" class="nav-logo">
                <img src="image/logo.png" alt="D'Brewista Cafe Logo" class="logo-image">
            </a>
        </div>
        <?php if (isset($_SESSION['username'])): ?>
        <a href="auth/logout.php" class="login-btn">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
    <?php else: ?>
        <a href="auth/login.php" class="login-btn">Log In</a>
    <?php endif; ?>

        <div class="search-bar">
            <input type="text" placeholder="🔍Search..." class="search-input"></div>
            <button id="menu-open-button" class="fas fa-bars"></button> 

  </header>
  <nav class="sidebar">
   
    <ul class="nav-menu">
        <button id="menu-close-button" class="fas fa-times"></button>
        <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="about.php" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
            <a href="products.php" class="nav-link">Products</a>
        </li>
        <li class="nav-item">
            <a href="menu.php"  class="nav-link">Our Menu</a>
        </li>
        <li class="nav-item">
            <a href="contact.php"  class="nav-link">Contact Us</a>
        </li>
    </ul>
</nav>

<main>

<section class="product-section">
    <h2 class="section-title">PRODUCTS</h2>
    <div class="section-content">
        <ul class="product-list">
            <li class="product-item">
                <img src="image/coffee.png" alt="COFFEE" class="product-image" style="width: 1000%; max-width: 600px; height: auto; display: block; margin : 0 auto; margin-left:290px;">
                <h3 class="name">COFFEE</h3>
                <p class="text">Wide range of steaming hot coffee to make you fresh and light.</p>
            </li>
            <li class="product-item">
                <img src="image/desserts.png" alt="DESSERTS" class="product-image" style="width: 1000%; max-width: 600px; height: auto; display: block; margin: 0 auto;  margin-right: 100px;">
                <h3 class="name">DESSERTS</h3>
                <p class="text">Satiate your palate and take you on a culinary treat.</p>
            </li>
            <li class="product-item">
                <img src="image/non-coffee.png" alt="NON COFFEE" class="product-image" style="width: 1000%; max-width: 600px; height: auto; display: block; margin: 0 auto; margin-left: 500px;">
                <h3 class="name">NON COFFEE</h3>
                <p class="text">Quench your thirst and refresh your soul with every sip.</p>
            </li>
        </ul>
    </div>
    
</section>

        
         
   

        <footer class="footer">
            <div class="footer-content">
                <div class="footer-left">
                    <p>Address: 123 Main Street, City State Province, Country</p>
                    <p>Contact: 041 225 0221</p>
                    <p>Email: <a href="mailto:info@happelowevents.com">info@happelowevents.com</a></p>
                </div>
                <div class="footer-right">
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="image/instagram.png" alt="Instagram" class="social-icon">
                    </a>
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="image/facebook.png" alt="Facebook" class="social-icon">
                    </a>
                    <a href="https://www.twitter.com" target="_blank">
                        <img src="image/twitter.png" alt="Twitter" class="social-icon">
                    </a>
                </div>
            </div>
        </footer>
    </section>
    </main>
     
    

    <script src="js/script.js"></script>


    
</body>
</html>
