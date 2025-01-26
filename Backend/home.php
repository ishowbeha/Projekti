<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Kjo është faqja që përdoruesi mund të shohë nëse është i loguar
echo "Welcome, " . $_SESSION['email'] . "!";
?>