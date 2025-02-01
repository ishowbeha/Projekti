<?php
session_start();
require_once('databaseConnection.php'); // Përdor require_once për të shmangur përfshirjen e dyfishtë

// Krijo instancën e lidhjes me databazën
$db = new DatabaseConnection();
$conn = $db->startConnection(); // Merr lidhjen me databazën

// Sigurohu që sesioni është i ndezur dhe përdoruesi është i kyçur
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT id, name, surname FROM users WHERE email = :email";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        // Ruaj ID-në dhe të dhënat e tjera në sesion
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
    }
}

// Funksionet për kontrollin e login dhe admin
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

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
?>
