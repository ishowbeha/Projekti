<?php
session_start();
session_unset();
session_destroy();
header("Location: LogIn1.php");
exit();
?>