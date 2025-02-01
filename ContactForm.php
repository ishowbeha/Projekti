
<!--Ketu gjnedet komplet kodi i kontakt form, ne menyre qe te mos krijohen shume files-->
<?php
include 'session.php';
checkLogin();
include 'session_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Forma</title>
        <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-size: cover; 
            margin: 0;
            padding: 0;
            background-image: url('LogInPhoto.png'); 
        }
 


        .contact-form {
            background-color: #f9f9f9;
            padding: 50px;
            border-radius: 8px;
            max-width: 600px;
            margin: 60px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .contact-form input[type="submit"] {
            background-color: #0a2540;
            color: white;
            border: none;
            cursor: pointer;
        }

        .contact-form input[type="submit"]:hover {
            background-color: #f4c542;
        }
    </style>
    
</head>
<body>

<header class="header">
        <div class="navbar">
            <div class="hamLogoSwitch">
            <div class="logo">
                <a id="aeLogos" href="index.php">
                     <img id="logo1" src="Icons/LogoKryesorePaBackground.png" alt="Logo" /></a>
                </div>
                <div class="hamburger" onclick="toggleMenu()">
                    &#9776; <!-- Kjo është ikona e hamburgerit -->
                </div>
                </div>
            <nav id="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php#categories">Category</a>
                <a href="index.php#slider-seksioni">Offerts</a>
                <a href="index.php#footer">Contact Us</a>
            </nav>
            <div style="pointer-events: none;" id="loginDiv">
            
            <?php if (isset($_SESSION['role']) && strtolower($_SESSION['role']) === 'admin'): ?>
                <a style="display: inline-block;" href="dashboard.php">
                    <button id="adminButton" style="background-color: #007bff; color: white; border: none; padding: 8px 20px 10px; font-size: 16px; cursor: pointer; pointer-events: auto;">
                            Admin Dashboard
                        </button>
                </a>
                <?php endif; ?>
                      
                <?php if (isset($_SESSION['email'])): ?>
                <a style="display: inline-block;" href="LogOut.php"><button style="    width: 95px;
                height: 35px;
                background-color: white;
                margin:0px 11px;
                border: none;
                cursor: pointer;
                pointer-events: auto;" id="butoniLogout">Log Out</button></a>
                <?php else: ?>
                    <a href="LogIn1.php" ><button id="butoniLogIn">Log In</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>


    <!-- Contact Form -->
    <div class="contact-form">
        <h2>Contact Us</h2>
        <form   action="process_contact.php" method="POST" onsubmit="return validateForm()">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Enter your name"><br>
            
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" placeholder="Enter your email"><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" placeholder="Write your message"></textarea><br>
            
            <input type="submit" value="Submit" id="btn">
        </form>
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
         function toggleMenu() {
        const navLinks = document.getElementById('nav-links');
        navLinks.classList.toggle('active');
    }
      </script>
      
    <script>
    document.addEventListener("DOMContentLoaded", function(ngjarja) {
    const SubmitButon = document.getElementById('btn');
    

            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;

            if (name == "") {
                alert("Emri është i detyrueshëm.");
                return false;
            }

            if(email === ""){
                alert("Email eshte i detyrueshem.");
                return false;
            }   

            if (message == "") {
                alert("Mesazhi është i detyrueshëm.");
                return false;
            }
            alert("U dergua me sukses");
            return true;
        }
        const emailValid = (email)=> {
        const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
        return emailRegex.test(email.toLowerCase());
    }
        SubmitButon.addEventListener('click', validate);

    );
    </script>
    <?php
require_once "process_contact.php";
?>
</body>
</html>