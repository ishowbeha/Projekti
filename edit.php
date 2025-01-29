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

    // Nëse përdoruesi nuk ka futur fjalëkalim të ri, përdor fjalëkalimin ekzistues
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashedPassword = $user['password']; // Mbetet i njëjti në databazë
    }

    $userRepository->updateUser($id, $name, $surname, $email, $hashedPassword);

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
        <div class="logo">
            <a href="index.html">
                <img src="Icons/LogoKryesorePaBackground.png" alt="Logo">
            </a>
        </div>
        <nav>
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

</body>
</html>
