<?php


// Parandalon qasjen në cache për faqet e mbrojtura
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['email'])) {
        header("Location: LogIn1.php"); 
        exit();
    }
}
