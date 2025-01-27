<?php
session_start();
session_destroy();
header("Location: LogIn.php"); // Redirect to login page after logout
exit;
?>