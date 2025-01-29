<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            margin-top: 120px;
            width: 90%;
            max-width: 1200px;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        h2 {
            color: #0a2540;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0a2540;
            color: white;
            font-size: 14px;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
            transition: 0.3s;
        }

        .edit-btn, .delete-btn {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .edit-btn:hover {
            background-color: #3e8e41;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
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

        @media (max-width: 768px) {
            .container {
                width: 95%;
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

            table {
                font-size: 12px;
            }

            th, td {
                padding: 8px;
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
            <a href="index.html#slider-seksioni">Offers</a>
            <a href="index.html#footer">Contact Us</a>
        </nav>
        <div id="loginDiv">
            <a href="LogIn1.php"><button id="butoniLogIn">Log In</button></a>
        </div>
    </div>
</header>

<div class="container">
    <h2>User Dashboard</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>SURNAME</th>
                <th>EMAIL</th>
                <th>GENDER</th>
                <th>DAY</th>
                <th>MONTH</th>
                <th>YEAR</th>
                <th>ROLE</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php 
            include_once 'userRepository.php';
            $userRepository = new UserRepository();
            $users = $userRepository->getAllUsers(); 

            foreach($users as $user){
                echo "
                <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['name']}</td>
                    <td>{$user['surname']}</td>
                    <td>{$user['email']}</td>
                    <td>{$user['gender']}</td>
                    <td>{$user['day']}</td>
                    <td>{$user['month']}</td>
                    <td>{$user['year']}</td>
                    <td>{$user['role']}</td>
                    <td><a href='edit.php?id={$user['id']}' class='edit-btn'>Edit</a></td>
                    <td><a href='delete.php?id={$user['id']}' class='delete-btn'>Delete</a></td>
                </tr>";
            }
            ?>
        </table>
    </div>
</div>

<footer class="footer">
    <div class="footer-container">
        <p>&copy; 2024 Furniture Luxenook. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
