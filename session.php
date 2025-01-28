<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: LogIn1.php");
    exit();
}

$user_email = $_SESSION['email']; // Merr email-in nga sesioni
?>