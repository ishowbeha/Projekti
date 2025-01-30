<?php
session_start();
function checkLogin() {
    if (!isset($_SESSION['email'])) {
        header("Location: sign_up.php"); 
        exit();
    }
}

function checkAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: index.php");
        exit();
    }
}

function isAdmin(){
    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
        return false;
    }
    return true;
}
?>