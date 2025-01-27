<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: LogIn.php"); // Redirect to login if not logged in
    exit;
}

echo "Welcome, " . $_SESSION['email'] . "!";
?>
<a href="LogOut.php">Logout</a>