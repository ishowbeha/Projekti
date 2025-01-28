<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sign_up.css">
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
                <a href="LogIn1.html"><button id="butoniLogIn">Log In</button></a>
            </div>
        </div>
    </header>
    <div class="c">
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="registerController.php" method="POST">
            <div class="input-container">
                <input type="text" class="inputet" placeholder="First Name" id="emri" name="name" required>
                <input type="text" class="inputet" placeholder="Last Name"  id="mbiemri" name="surname" required>
            </div>
            
            <input type="email" class="inputet" placeholder="Email"         id="email"name="email" required>
            <div class="mainGender">
                    <div class="genders">
                        <input id="female" type="radio" name="gender" value="Female">
                        <label for="female">Female</label>
                    </div>
                <div class="genders">
                    <input id="male" type="radio" name="gender" value="Male">
                    <label for="male">Male</label>
                </div>
            </div>
            <div class="birthday-container">
                <select name="day" required>
                    <option value="" disabled selected>Day</option>
                    <!-- Ditët nga 1 në 31 -->
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>

                <select name="month" required>
                    <option value="" disabled selected>Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                
                <select name="year" required>
                    <option value="" disabled selected>Year</option>
                    <!-- Vitet nga 2000 në 2024 -->
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            
            <input type="password" class="inputet" id="pass" placeholder="Password" name="password" required>
            <div class="inputet">
           <select name="role" id="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
           </select>
           </div>
           <form action="registerController.php" method="POST">
    <button type="submit" name="registerBtn" class="butoni" id="btn">Sign Up</button>
</form>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="logIn1.html">Login</a></p> <!-- Linku për Login -->
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
    <script src="sign_up.js"></script>
    <?php
    include_once 'registerController.php';
    ?>
</body>
</html>