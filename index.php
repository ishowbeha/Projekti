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
    <title>Furniture Website</title>
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

    <section id="home" class="hero">
        <div class="hero-content">
            <h1 style="color: rgb(124, 171, 184); ">WHERE FUNCTION MEETS STYLE</h1>
            <p style="color: rgb(124, 171, 184); ">Design your home , design your story...</p>
            <div class="position">

        
            <button class="btn" onclick="scrollToSlider()">SEE MORE</button>
            </div>
        </div>

    </section>
    <div id="kontenti">
        <div>
            <h2 id="ShikoMEShumeID">Click NEXT to see more</h2>
            <img  id="slideshow" src="foto1.avif" alt="Kliko NEXT per t'u kthyer te fortoja e pare!" />
        </div>
        <div class="next-btn-container">
            <button class="next-btn" onclick="ndrroImg()">NEXT</button>
        </div>
    </div>

    <section id="categories">
        <div id="shikoMore">
            <h2 id="kategoritText">Shop by Categories</h2>
            <p>Explore our wide range of furniture categories.</p>
        </div>
    
        <div class="categories-grid">
            <!-- Chair-->
            <a href="Chair.php" class="category-link">
                <div class="category-card">
                    <img src="Icons/ChairLogo.png" alt="Chair">
                    <h3>Chair</h3>
                    <p>Discover a range of comfortable chairs.</p>
                </div>
            </a>
    
            <!-- Sofa -->
            <a href="Sofa.php"  class="category-link">
                <div class="category-card">
                    <img src="Icons/SofaLogo.png" alt="Sofa">
                    <h3>Sofa</h3>
                    <p> Relax in style with our sofas.</p>
                   
                </div>
            </a>
    
            <!-- Bedroom-->
            <a href="BedRoom.php" class="category-link">
                <div class="category-card">
                    <img src="Icons/BedroomLogo.png" alt="Bedroom">
                    <h3>Bedroom</h3>
                    <p>Embrace the power of being different.</p>
                    
                </div>
            </a>
    
            <!-- Table -->
            <a href="Table.php" class="category-link">
                <div class="category-card">
                    <img src="Icons/TableLogo.png" alt="Table">
                    <h3>Table</h3>
                    <p>Find the perfect table for your home.</p>
                </div>
                
            </a>
    
            <!-- Wardrobe-->
            <a href="Wardrobe.php" class="category-link">
                <div class="category-card">
                    <img src="Icons/WardrobeLogo.png" alt="Bed">
                    <h3>Wardrobes</h3>
                    <p>Organize your space with waredobe.</p>
                </div>
            </a>
        </div>
    </section>


    <section id="slider-seksioni" class="slider-seksioni">
        <div class="slider-container">
         
            <div class="slider-informacion">
                <h2>Special Offer 30% OFF</h2>
                <h3>Furniture Sale</h3>
                <button class="blej-tani">Buy Now</button>
            </div>
    
        
            <div class="slider">
                <img id="slider-imazh" src="photoSlider1.jpg" alt="Slider Image" />
            </div>
        </div>
    </section>

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
            <p ><a id="a" href="ContactForm.php">Click here to contact us</a></p>
        </div>
      </footer>

    <script src="script.js"></script>



</body>
</html>
