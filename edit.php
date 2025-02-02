<?php
include 'session.php';
checkLogin();
include 'session_control.php';
?>
<?php
$userId = $_GET['id'];

include_once 'userRepository.php';

$userRepository = new UserRepository();

$user  = $userRepository->getUserById($userId);

if(isset($_POST['editBtn'])){
    $id = $user['id']; 
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role=$_POST['role'];


    // Nëse përdoruesi nuk ka futur fjalëkalim të ri, përdor fjalëkalimin ekzistues
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashedPassword = $user['password']; // Mbetet i njëjti në databazë
    }

    $userRepository->updateUser($id, $name, $surname, $email, $hashedPassword, $role);

    header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('LogInPhoto.png'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #0a2540;
            color: white;
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-between;
            padding: 0 20px;
        }

        .navbar .logo img {
            width: 120px;
            height: auto;
        }

        .navbar nav a {
            color: white;
            margin: 0 1rem;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar nav a:hover {
            color: #f4c542;
        }

        #loginDiv #butoniLogIn {
            width: 95px;
            height: 35px;
            background-color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        #butoniLogIn:hover {
            transform: scale(1.05);
        }

        .container {
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
            margin: 140px auto;
        }

        h2 {
            color: #0a2540;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .inputet {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 16px;
            background-color: #f8f9fc;
        }

        .butoni {
            width: 100%;
            padding: 12px;
            background-color: #0a2540;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .butoni:hover {
            background-color: #071531;
        }

        .footer {
            background-color: #0a2540;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }

        .footer-container {
            max-width: 600px;
            margin: auto;
        }

        .footer p, .footer a {
            color: white;
            font-size: 14px;
        }

        .footer a:hover {
            text-decoration: underline;
        }
        .hamburger {
    display: none; /* Initially hidden */
    flex-direction: column;
    cursor: pointer;
    font-size: 36px;
    width: 30px; /* Width of the hamburger */
    height: 56px; /* Height of the hamburger */
}

.bar {
    height: 4px; /* Height of each bar */
    width: 100%; /* Full width */
    background-color: white; /* Bar color */
    margin: 2px 0; /* Space between bars */
    transition: all 0.3s ease; /* Smooth transition */
}

/* Navigation links styles */
#nav-links {
    display: flex;
    flex-direction: row;
    align-items: center;
}

#nav-links a {
    color: white;
    margin: 0 1rem;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: bold;
    transition: color 0.3s ease;
}

/* Active class for nav links */
#nav-links.active {
    display: block; /* Show links when active */
}
.navbar .hamLogoSwitch{
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
    margin-left: 20px;

}
   .navbar { display: flex;
            align-items: center;
            width: 100%;
            justify-content: center;}
            .butoni{margin-bottom: 3px;}
  
/* Responsive styles */
@media (max-width: 768px) {
    .hamburger {
        display: flex; /* Show hamburger on small screens */
    }

    #nav-links {
        display: none; /* Hide links by default on small screens */
        flex-direction: column; /* Stack links vertically */
        position: absolute; /* Positioning */
        top: 121px; /* Position below the header */
        left: 0;
        background-color: #0a2540; /* Background color for dropdown */
        padding: 10px 0; /* Padding */
        z-index: 1000; /* Ensure it appears above other content */
    }

    #nav-links.active {
        display: flex; /* Show links when active */
    }

    #nav-links a {
        padding: 10px 20px; /* Add padding to links */
        border-bottom: 1px solid #555; /* Optional: add a border between links */
    }

    #nav-links a:hover {
        background-color: #555; /* Change background on hover */
    }
}
        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            .navbar {
                flex-direction: column;
                align-items: center;
            }

            .navbar nav {
                display: flex;
                flex-direction: column;
                text-align: center;
            }

            .navbar nav a {
                margin: 5px 0;
            }
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
       
    </div>
</header>

<div class="container">
    <h2>Edit User</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input class="inputet" type="text" name="name" id="name" value="<?=$user['name']?>" required> <br> <br>
        
        <label for="surname">Surname:</label>
        <input class="inputet" type="text" name="surname" id="surname" value="<?=$user['surname']?>" required> <br> <br>
        
        <label for="email">Email:</label>
        <input class="inputet" type="email" name="email" id="email" value="<?=$user['email']?>" required> <br> <br>
        
        <label for="password">Password (leave blank to keep current):</label>
        <input class="inputet" type="password" name="password" id="password" placeholder="Enter new password"><br> <br>

        <div class="inputet">
            <select style="border: none; background: none; width: 100%; font-size: 16px; outline: none;"
    name="role" id="role">
    <option value="User" <?= $user['role'] == 'User' ? 'selected' : '' ?>>User</option>
    <option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
</select>
            </div>

        <button type="submit" name="editBtn" class="butoni">Save Changes</button> <br> <br>
    </form>
</div>

<footer class="footer">
    <div class="footer-container">
        <h4>Contact Us</h4>
        <p><strong>Phone:</strong> +38349878666 | +38344878666</p>
        <p><strong>Email:</strong> <a href="mailto:luxenook@outlook.com">luxenook@outlook.com</a></p>
        <p><strong>Address:</strong> Lagjja Kalabria, 10000 Prishtinë, Kosovo</p>
        <p>Abi Carshia, Prizren</p>
    </div>
    <div>
        <p>&copy; 2024 Furniture Luxenook. All rights reserved.</p>
    </div>
</footer>
<script>
            function toggleMenu() {
        const navLinks = document.getElementById('nav-links');
        navLinks.classList.toggle('active');
        }
        </script>

</body>
</html>
