<?php session_start();
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
        <section class="about-section">
            <div class="section-content">
                <div class="about-image-wrapper">
                    <img src="image/about-image.jpg"  alt="About"   class="about-image">
                </div>
                <div class="about-details">
                 <h2 class="section-title">What makes our coffee special?</h2>
                    <p class="text">At D'Brewista Cafe, we believe every cup of coffee tells a story. Our coffee is crafted with passion, starting with the finest, sustainably sourced beans from the best coffee-growing regions around the world. Each bean is roasted to perfection, bringing out rich, complex flavors that awaken your senses with every sip.
    
                        What sets us apart is our commitment to freshness and quality. Every cup is brewed to order, ensuring that you experience the true essence of coffee, whether you prefer a bold espresso or a creamy latte. Pair that with our cozy atmosphere and warm hospitality, and you'll see why our coffee isn't just a drink—it's an experience.
                    </p>
                </div>
            </div>
        </section>
    
        <section class="mission-vision-section">
            <div class="section-content">
                <h2 class="section-title">Our Vision</h2>
                <p class="text">"To be the heart of the community, offering a welcoming space where people can come together, connect, and enjoy exceptional coffee, creating moments of joy and inspiration."</p>
                
                <h2 class="section-title">Our Mission</h2>
                <p class="text">"Our mission is to provide an unforgettable coffee experience by offering premium, ethically sourced coffee, served with a commitment to quality, sustainability, and customer satisfaction. We strive to create a cozy environment where everyone feels at home, fueling creativity, conversations, and connections."</p>
            </div>
        </section>
        <div>
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
