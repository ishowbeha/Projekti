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
    <title>Chair</title>
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
                    <a href="LogIn1.php"><button id="butoniLogIn">Log In</button></a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <h1>Chairs</h1>
    <div class="KutiaKryesore">
      
      <div class="kutia">
          <img src="ChairsPage/1.jpg" alt="Aurora Comfort">
          <h1>Aurora Comfort</h1>
          <p class="cmimi">$199.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Aurora Comfort">
              <input type="hidden" name="price" value="199.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/2.jpg" alt="Elite Luxe">
          <h1>Elite Luxe</h1>
          <p class="cmimi">$249.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Elite Luxe">
              <input type="hidden" name="price" value="249.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/3.jpg" alt="Zenith Recliner">
          <h1>Zenith Recliner</h1>
          <p class="cmimi">$299.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Zenith Recliner">
              <input type="hidden" name="price" value="299.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/4.jpg" alt="Grand Majesty">
          <h1>Grand Majesty</h1>
          <p class="cmimi">$399.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Grand Majesty">
              <input type="hidden" name="price" value="399.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/5.jpg" alt="Serenity Seat">
          <h1>Serenity Seat</h1>
          <p class="cmimi">$199.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Serenity Seat">
              <input type="hidden" name="price" value="199.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/6.jpg" alt="CloudNest">
          <h1>CloudNest</h1>
          <p class="cmimi">$249.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="CloudNest">
              <input type="hidden" name="price" value="249.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/7.jpg" alt="Regal Haven">
          <h1>Regal Haven</h1>
          <p class="cmimi">$299.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Regal Haven">
              <input type="hidden" name="price" value="299.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/8.jpg" alt="Prestige Plush">
          <h1>Prestige Plush</h1>
          <p class="cmimi">$399.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Prestige Plush">
              <input type="hidden" name="price" value="399.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/9.jpg" alt="Velvet Bliss">
          <h1>Velvet Bliss</h1>
          <p class="cmimi">$199.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Velvet Bliss">
              <input type="hidden" name="price" value="199.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/10.jpg" alt="Modern Edge">
          <h1>Modern Edge</h1>
          <p class="cmimi">$249.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Modern Edge">
              <input type="hidden" name="price" value="249.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/11.jpg" alt="Harmony Lounger">
          <h1>Harmony Lounger</h1>
          <p class="cmimi">$299.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Harmony Lounger">
              <input type="hidden" name="price" value="299.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  
      <div class="kutia">
          <img src="ChairsPage/12.jpg" alt="Opulence Chair">
          <h1>Opulence Chair</h1>
          <p class="cmimi">$399.00</p>
          <form action="OrderController.php" method="POST">
              <input type="hidden" name="product_name" value="Opulence Chair">
              <input type="hidden" name="price" value="399.00">
              <button type="submit" class="butoniBuy">Order Now</button>
          </form>
      </div>
  </div>
      </footer>
      
      <?php
include('OrderController.php');  // Lidhje me buyProduct.php për të ekzekutuar funksionet e tij
?>
</body>
</html>