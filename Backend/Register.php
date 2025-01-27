<?php
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Get form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender']; 
    $dob_day = $_POST['dob_day']; // Të dhënat e gjinisë
    $dob_month = $_POST['dob_month'];  // Muaji i lindjes
    $dob_year = $_POST['dob_year'];  // Viti i lindjes

    // Register the user
    if ($user->register(name: $name, surname: $surname, email: $email, password: $password,gender: $gender,dob_day: $dob_day, dob_month: $dob_month, dob_year: $dob_year)) {
        header("Location: LogIn1.html"); // Redirect to login page
        exit;
    } else {
        echo "Error registering user!";
    }
}

?>