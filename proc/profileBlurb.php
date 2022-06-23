<?php

if (!isset($_POST['submit']))
{
    header('Location: ../profile.php');
    exit();
}

// Get blurb from tinymce input
$blurb = $_POST['mytinymce'];

// Instantiate ProfileCtrl class
include '../classes/DB.php';
include '../classes/Profile.php';
include '../classes/ProfileBlurbCtrl.php';
$profile = new ProfileBlurbCtrl($blurb);

// Error handlers and update profile blurb
$profile->addBlurb();

// Back to profile page
header('Location: ../profile.php?feedback=blurbupdated');
exit();