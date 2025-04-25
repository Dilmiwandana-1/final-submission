<?php
session_start();

include('includes/db.php'); 

$response = []; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $description = htmlspecialchars($_POST['description']);

    if (!empty($name) && !empty($email) && !empty($description)) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $description);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Your message has been sent successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'There was an error submitting your message. Please try again later.';
        }

        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Please fill in all the fields.';
    }

    $conn->close();
    echo json_encode($response);
    exit;
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

  <div class="contact-container">
    <h1>Contact Us</h1>
    <form id="contactForm" method="POST" class="contact-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your Name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" placeholder="Your Message" required></textarea>

        <button type="submit">Submit</button>
    </form>
    <div id="responseMessage"></div>
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

  <script src="js/script.js"></script>

  <script>
   document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    
    let formData = new FormData(this);

    
    fetch('contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        
        let responseMessage = document.getElementById('responseMessage');
        if (data.status === 'success') {
            responseMessage.innerHTML = '<p class="success-message">' + data.message + '</p>';

            
            document.getElementById('contactForm').reset();

        } else {
            responseMessage.innerHTML = '<p class="error-message">' + data.message + '</p>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

  </script>

</body>
</html>
