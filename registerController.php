<?php

include_once 'userRepository.php';
include_once 'user.php';

if (isset($_POST['registerBtn'])) {
    if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) ||
        empty($_POST['gender']) || empty($_POST['password']) || empty($_POST['role']) ||
        empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year'])) {
        echo "Fill all fields!";
    } else {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = $_POST['role'];

        $id = $email . rand(100, 999);

        $user = new User($id, $name, $surname, $email, $gender, $day, $month, $year, $password, $role);


        $userRepository = new UserRepository();
        $userRepository->insertUser($user);
        header("Location: LogIn1.html");
        exit();
    }
}
?>