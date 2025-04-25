<?php
session_start();
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
        <a href="index.php" class="nav-logo">
            <img src="image/logo.png" alt="D'Brewista Cafe Logo" class="logo-image">
        </a>
    </div>

    <?php if (isset($_SESSION['username'])): ?>
        <a href="auth/logout.php" class="login-btn">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
    <?php else: ?>
        <a href="auth/login.php" class="login-btn">Log In</a>
    <?php endif; ?>

    <div class="search-bar">
        <input type="text" placeholder="🔍Search..." class="search-input">
    </div>
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
        
        <section class="hero-section">
        <div class="section-content">
        <div class="hero-details">
            <h2 class="title">Welcome to our cafe</h2>
            <p class="description">Welcome to our coffee paradise,where every been tells a story and every cup sparks joy.</p>
            <h3 class="subtitle">"Where Every Sip Feels Like Home"</h3>
        </div>
        <div class="hero-image-wrapper">
            <img src="image/coffee-hero-section.png"   alt="Hero"   class="hero-image">
           
        </div>
        </div>
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
