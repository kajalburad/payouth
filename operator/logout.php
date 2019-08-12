<?php
session_start();
session_destroy();
unset($_SESSION['college_email']);
unset($_SESSION['college_users_id']);
unset($_SESSION['college_section']);
header("Location:login.php");
?>