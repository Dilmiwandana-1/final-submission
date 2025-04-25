<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $dbname = "d'brewista cafe"; 
    $username = 'root';
    $password = '';
    $conn = new mysqli($host, $username, $password, $dbname, 3307);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "This email is already registered.";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $email, $pass);

        if ($stmt->execute()) {
            header("Location: login.php?signup=success");
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - D'Brewista Cafe</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="../index.php" class="nav-logo">
                <img src="../logo.png" alt="D'Brewista Cafe Logo" class="logo-image">
            </a>
        </div>
        <a href="login.php" class="login-btn">Log In</a>
        <div class="search-bar">
            <input type="text" placeholder="🔍Search..." class="search-input">
        </div>
        <button id="menu-open-button" class="fas fa-bars"></button> 
    </header>

    <nav class="sidebar">
        <ul class="nav-menu">
            <button id="menu-close-button" class="fas fa-times"></button>
            <li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="../about.php" class="nav-link">About Us</a></li>
            <li class="nav-item"><a href="../products.php" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="../menu.php" class="nav-link">Our Menu</a></li>
            <li class="nav-item"><a href="../contact.php" class="nav-link">Contact Us</a></li>
        </ul>
    </nav>

    <main>
        <section class="signup-section">
            <div class="signup-container">
                <h2 class="signup-title">Create an Account</h2>
                <p class="signup-description">Join us and stay updated with our latest brews and offers!</p>

                <?php if (isset($error)) echo "<p class='error-message' style='color:red;'>$error</p>"; ?>

                <form action="" method="POST" class="signup-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required pattern=".{6,}" title="Password must be at least 6 characters long">
                    </div>
                    <button type="submit" class="signup-btn">Sign Up</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <p>Address: 123 Main Street, City State Province, Country</p>
                <p>Contact: 041 225 0221</p>
                <p>Email: <a href="mailto:info@happelowevents.com">info@happelowevents.com</a></p>
            </div>
            <div class="footer-right">
                <a href="https://www.instagram.com" target="_blank"><img src="../instagram.png" alt="Instagram" class="social-icon"></a>
                <a href="https://www.facebook.com" target="_blank"><img src="../facebook.png" alt="Facebook" class="social-icon"></a>
                <a href="https://www.twitter.com" target="_blank"><img src="../twitter.png" alt="Twitter" class="social-icon"></a>
            </div>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
