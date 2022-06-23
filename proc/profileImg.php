<?php

if (!isset($_POST['submit']))
{
    header('Location: ../profile.php');
    exit();
}

// Get data (profile img)
$file = $_FILES['file'];

// Instantiate SignupCtrl class
include '../classes/DB.php';
include '../classes/Profile.php';
include '../classes/ProfileImgCtrl.php';
$profile = new ProfileImgCtrl($file);

// Error handlers and add/update profile img
$profile->addImg();

// Back to front page
header('Location: ../profile.php?feedback=fileuploaded');
