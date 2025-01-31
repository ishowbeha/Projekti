<?php
require_once "ContactController.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    $contactController = new ContactController();
    $response = $contactController->submitMessage($name, $email, $message);

    echo "<script>alert('$response'); window.location.href = 'ContactForm.php';</script>";
    exit();
}
?>

