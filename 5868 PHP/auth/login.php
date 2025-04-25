<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', "d'brewista cafe", 3307);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $id;

            header("Location: ../index.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "No user found with that username.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - D'Brewista Cafe</title>
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
    <a href="../index.php" class="login-btn">Log In</a>
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
    <div class="login-container">
        <h1 class="logo">D'Brewista Cafe</h1>
        <form class="login-form" method="POST" action="">
            <h2>Login</h2>

            <?php if (!empty($error)): ?>
                <p style="color:red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn1">Log In</button>

            <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
</main>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-left">
            <p>Address: 123 Main Street, City, State, Country</p>
            <p>Contact: 041 225 0221</p>
            <p>Email: <a href="mailto:info@happelowevents.com">info@happelowevents.com</a></p>
        </div>
        <div class="footer-right">
            <a href="https://www.instagram.com" target="_blank">
                <img src="../instagram.png" alt="Instagram" class="social-icon">
            </a>
            <a href="https://www.facebook.com" target="_blank">
                <img src="../facebook.png" alt="Facebook" class="social-icon">
            </a>
            <a href="https://www.twitter.com" target="_blank">
                <img src="../twitter.png" alt="Twitter" class="social-icon">
            </a>
        </div>
    </div>
</footer>

<script src="../js/script.js"></script>
</body>
</html>
