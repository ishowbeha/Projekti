<?php
session_start();
session_unset(); // Fshin të gjitha variablat e sesionit
session_destroy(); // Shkatërron sesionin

// Parandalon shfletuesin të ruajë faqen në cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Ridrejton përdoruesin në faqen e hyrjes
header("Location: LogIn1.php");
exit();
?>