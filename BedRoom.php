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
    <title>Bedroom</title>
    <link rel="stylesheet" href="kategorite.css">
    <link rel="stylesheet" href="style.css">
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
                <a href="index.php">Contact Us</a>
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
                    <a href="LogIn1.php"><button id="butoniLogIn">Log In</button></a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <h1>Bedrooms</h1>
    <div class="KutiaKryesore">
      
        <div class="kutia">
            <img src="BedroomPage/1.jpg" alt="Bedroom 1">
            <p class="cmimi">$199.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
        
        <div class="kutia">
            <img src="BedroomPage/2.jpg" alt="Bedroom 2">
            <p class="cmimi">$249.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
      
        <div class="kutia">
            <img src="BedroomPage/3.jpg" alt="Bedroom 3">
            <p class="cmimi">$299.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
        
        <div class="kutia">
            <img src="BedroomPage/4.jpg" alt="Bedroom 4">
            <p class="cmimi">$399.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
     
        <div class="kutia">
            <img src="BedroomPage/5.jpg" alt="Bedroom 5">
            <p class="cmimi">$199.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
 
        <div class="kutia">
            <img src="BedroomPage/6.jpg" alt="Bedroom 6">
            <p class="cmimi">$249.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
       
        <div class="kutia">
            <img src="BedroomPage/7.jpg" alt="Bedroom 7">
            <p class="cmimi">$299.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
       
        <div class="kutia">
            <img src="BedroomPage/8.jpg" alt="Bedroom 8">
            <p class="cmimi">$399.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
     
        <div class="kutia">
            <img src="BedroomPage/9.jpg" alt="Bedroom 9">
            <p class="cmimi">$199.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
     
        <div class="kutia">
            <img src="BedroomPage/10.jpg" alt="Bedroom 10">
            <p class="cmimi">$249.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
      
        <div class="kutia">
            <img src="BedroomPage/11.jpg" alt="Bedroom 11">
            <p class="cmimi">$299.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
       
        <div class="kutia">
            <img src="BedroomPage/12.jpg" alt="Bedroom 12">
            <p class="cmimi">$399.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
     
        <div class="kutia">
            <img src="BedroomPage/13.jpg" alt="Bedroom 13">
            <p class="cmimi">$199.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
       
        <div class="kutia">
            <img src="BedroomPage/14.jpg" alt="Bedroom 14">
            <p class="cmimi">$249.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
      
        <div class="kutia">
            <img src="BedroomPage/15.jpg" alt="Bedroom 15">
            <p class="cmimi">$299.00</p>
            <button class="butoniBuy">Buy Now</button>
        </div>
      
        <div class="kutia">
            <img src="BedroomPage/16.jpg" alt="Bedroom 16">
            <p class="cmimi">$399.00</p>
            <button class="butoniBuy">Buy Now</button>
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
</body>
</html>