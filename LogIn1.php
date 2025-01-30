<?php
session_start();
ob_start();
include_once 'databaseConnection.php';
include_once 'userRepository.php';

if (isset($_SESSION['email'])) {
    header("Location: index.php");
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
        $_SESSION['role'] = $user['role']; // Ruajmë rolin për kontroll
        header("Location: index.php");
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
    <title>Login</title>
    <link rel="stylesheet" href="LogIn1.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="header">
        <div class="navbar">
            <div class="hamLogoSwitch">
                <div class="logo">
                    <a id="aeLogos" href="index.php">
                        <img id="logo1" src="Icons/LogoKryesorePaBackground.png" alt="Logo" />
                    </a>
                </div>
                <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
            </div>
            <nav id="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php#categories">Category</a>
                <a href="index.php#slider-seksioni">Offerts</a>
                <a href="index.php#footer">Contact Us</a>
            </nav>
            <div id="loginDiv">
                <?php if (isset($_SESSION['email'])): ?>
                    <a href="logout.php"><button id="butoniLogout">Logout</button></a>
                <?php else: ?>
                    <a href="LogIn1.php"><button id="butoniLogIn">Log In</button></a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div class="c">
        <div class="container">
            <h2>Login</h2>
            <?php if (!empty($error_message)): ?>
                <p style="color: red; text-align: center;">
                    <?php echo $error_message; ?>
                </p>
            <?php endif; ?>

            <form id="loginForm" action="LogIn1.php" method="POST">
                <input type="email" class="inputet" id="userid" placeholder="Email" name="email" required>
                <input type="password" class="inputet" id="pass" placeholder="Password" name="password" required>
                <button type="submit" class="butoni" id="btn">Login</button>
            </form>
            <div id="signup-link">
                <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p>
            </div>
        </div>
    </div>

    <footer id="footer" class="footer">
        <div class="footer-container">
            <h4>Contact Us</h4>
            <p><strong>Phone:</strong> +38349878666 | +38344878666</p>
            <p><strong>Email:</strong> <a href="mailto:luxenook@outlook.com">luxenook@outlook.com</a></p>
            <p><strong>Address:</strong> Lagjja Kalabria, 10000 Prishtine, Kosovo</p>
            <p>Abi Carshia, Prizren</p>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Furniture Luxenook. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('loginForm').addEventListener('submit', function (event) {
                let username = document.getElementById("userid").value;
                let password = document.getElementById("pass").value;

                if (username.trim() === "" || password.trim() === "") {
                    alert("Email dhe fjalëkalimi janë të detyrueshëm.");
                    event.preventDefault();
                }
            });
        });

        function toggleMenu() {
            document.getElementById('nav-links').classList.toggle('active');
        }
    </script>

</body>

</html>