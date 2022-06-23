<?php

if (!isset($_POST['submit']))
{
    header('Location: ../index.php');
    exit();
}

// Get data
$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwdx2 = $_POST['pwdx2'];

// Instantiate SignupCtrl class
include '../classes/DB.php';
include '../classes/Signup.php';
include '../classes/SignupCtrl.php';
$signup = new SignupCtrl($username, $email, $pwd, $pwdx2);

// Error handlers and user signup
$signup->signupUser();

// Redirect to profile
header('Location: ../profile.php?feedback=signedup');

