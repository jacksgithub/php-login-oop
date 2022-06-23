<?php

if (!isset($_POST['submit']))
{
    header('Location: ../index.php#login');
    exit();
}

// Get data
$login = $_POST['login'];
$pwd = $_POST['pwd'];

// Instantiate LoginCtrl class
include '../classes/DB.php';
include '../classes/Login.php';
include '../classes/LoginCtrl.php';
$login = new LoginCtrl($login, $pwd);

// Error handlers and user signup
$login->loginUser();

if ($_SESSION['username'] === 'admin') {
    // Redirect to admin page if admin
    header('Location: ../admin.php');
} else {
    // Back to front page
    header('Location: ../index.php?feedback=loggedin');
}