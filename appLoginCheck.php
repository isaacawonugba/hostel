<?php
    session_start();
    if(!isset($_SESSION['username']) || ($_SESSION['username'] == "") || ($_SESSION['role'] != 1))
    {
        require_once("Student.php");
        $user = new Student();
        $user->logout();
        header("location:invalidlogin.php");
    }
?>
