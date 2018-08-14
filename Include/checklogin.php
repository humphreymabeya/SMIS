<?php

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../Session/login.php");
    exit();
}
?>