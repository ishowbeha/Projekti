<?php
session_start();
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Attempt to log in
    if ($user->login($email, $password)) {
        header("Location: home.php"); // Redirect to home page
        exit;
    } else {
        echo "Invalid login credentials!";
    }
}
?>
