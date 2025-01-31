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
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: #f4f4f4;
        }

        .header {
            background-color: #0a2540;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .navbar {
            display: flex;
            align-items: center;
        }

        .navbar nav {
            display: flex;
            gap: 15px;
        }

        .navbar nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
        }

        .navbar nav a:hover {
            color: #f4c542;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #0a2540;
            color: white;
        }

        .edit-btn, .delete-btn {
            padding: 8px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

    .edit-btn { background-color: #4CAF50; color: white; }
    .delete-btn { background-color: #f44336; color: white; }

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
        <a href="index.php#slider-seksioni">Offers</a>
        <a href="index.php#footer">Contact Us</a>
    </nav>
</div>
</header>

<div class="container">
    <h2>User Dashboard</h2>
    <div style="width: 100%;
            display: flex;    
            justify-content: flex-end;
            margin-bottom: 5px;" class="mbeshtjellsi">
    <div style="width: 115px;
    height: 35px;
    background-color: orange;
    margin: 0px 11px;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    transition: 0.3s;
    position: relative;"
    onmouseover="this.style.backgroundColor='darkorange';" 
    onmouseout="this.style.backgroundColor='orange';"
    id="createButton">
    <a style=" color: white;
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;" href="createUserForm.php">Create User</a>
    </div>
    </div>
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
<script>
     function toggleMenu() {
        const navLinks = document.getElementById('nav-links');
        navLinks.classList.toggle('active');
    }
</script>

</body>
</html>
