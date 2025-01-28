<?php
session_start();
ob_start();

include_once 'databaseConnection.php';
include_once 'userRepository.php';

if (isset($_SESSION['email'])) {
    header("Location: index.html"); 
    exit();
}

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $userRepo = new UserRepository();
    $user = $userRepo->getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email']; 

        header("Location: index.html");
        exit();
    } else {
        $error_message = "Email ose fjalëkalimi është gabim!";
    }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="LogIn1.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header class="header">
        <div class="navbar">
            <div class="logo">
                <img id="logo1" src="Icons/LogoKryesorePaBackground.png" alt="Logo" />
            </div>
            <div class="hamburger" onclick="toggleMenu()">
                &#9776; <!-- This is the hamburger icon -->
            </div>
            <nav id="nav-links">
                <a href="index.html">Home</a>
                <a href="index.html#categories">Category</a>
                <a href="index.html#slider-seksioni">Offerts</a>
                <a href="index.html#footer">Contact Us</a>
            </nav>
            <div id="loginDiv">
                <a href="LogIn1.php"><button id="butoniLogIn">Log In</button></a>
            </div>
        </div>
    </header>
<div class="c">
    <div class="container">
        <h2>Login</h2>
        <form action="LogIn1.php" method="POST">
            <input type="email" class="inputet" id="userid" placeholder="Email" name="email" required size="20">
            <input type="password" class="inputet" id="pass" placeholder="Password" name="password" required size="15">
            <button type="submit" class="butoni" name="loginBtn" id="btn">Login</button>
        </form>
        <div id="signup-link">
            <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p> 
        </div>
    </div>
</div>
<footer id="footer" class="footer">
    <div class="footer-container">
      <h4>Contact Us</h4>
      <p><strong>Phone:</strong></p>
      <p>+38349878666 | +38344878666</p>
      <p><strong>Email:</strong></p>
      <p><a href="mailto:luxenook@outlook.com">luxenook@outlook.com</a></p>
      <p><strong>Address:</strong></p>
      <p>Lagjja Kalabria,10000 Prishtine, Kosovo</p>
      <p>Abi Carshia, Prizren</p>
    </div>
    <div class="footer-bottom">
      <p id="p" style="margin-bottom: 30px;">&copy; 2024 Furniture Luxenook. All rights reserved.</p>
    </div>

    <div id="contactForm" class="contact-form-link">
        <p ><a id="a" href="ContactForm.html">Click here to contact us</a></p>
    </div>
  </footer>
  <script>

  document.addEventListener("DOMContentLoaded", function(ngjarja) {
    const SubmitButon = document.getElementById('btn');
    
    const validate = (ngjarja) => {
    ngjarja.preventDefault();
            var username = document.getElementById("userid").value;
            var password = document.getElementById("pass").value;

            if (username === "") {
                alert("Emri i përdoruesit është i detyrueshëm.");
                return false;
            }


            if (password === "") {
                alert("Fjalëkalimi është i detyrueshëm.");
                return false;
            }
            alert("logimi u krue me sukses!");
            return true; 
            
        }
        SubmitButon.addEventListener('click', validate);
    });
  </script>
 
</body>
</html>