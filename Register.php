<?php
include_once 'Database.php';
include_once 'User .php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Get form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $gender = $_POST['gender']; 
    $dob_day = $_POST['dob_day'];
    $dob_month = $_POST['dob_month'];
    $dob_year = $_POST['dob_year'];
    $password = $_POST['password'];

    // Register the user
    if ($user->register($name, $surname, $email, $gender, $dob_day, $dob_month, $dob_year, $password)) {
        header("Location: LogIn.php"); // Redirect to login page
        exit;
    } else {
        echo "Error registering user!";
    }
}
?>