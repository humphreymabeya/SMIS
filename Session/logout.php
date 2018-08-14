<?php

    // ob_start();
    // session_start();
    // unset($_SESSION['rainbow_name']);
    // unset($_SESSION['rainbow_uid']);
    // unset($_SESSION['rainbow_username']);
    // echo '<script type="text/javascript">window.location="login.php"; </script>';

// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>