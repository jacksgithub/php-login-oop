<?php

class Feedback {

    public function getFeedback() {
        $feedback = '';

        if (isset($_GET['error'])) {
            $feedback = '<div class="alert alert-danger" role="alert">';

            if ($_GET['error'] == 'stmt1failed' || $_GET['error'] == 'cannotcreateuser') {
                $feedback .= 'Database error!';
            } else if ($_GET['error'] == 'invalidname') {
                $feedback .= 'Invalid Name!';
            } else if ($_GET['error'] == 'invalidemail') {
                $feedback .= 'Invalid Email!';
            } else if ($_GET['error'] == 'invalidusername') {
                $feedback .= 'Invalid Username!';
            } else if ($_GET['error'] == 'pwdsdontmatch') {
                $feedback .= 'Passwords do not match!';
            } else if ($_GET['error'] == 'emailorusernameexist') {
                $feedback .= 'Username or Email already exist!';
            } else if ($_GET['error'] == 'usernotfound') {
                $feedback .= 'Username/Email do not exist!';
            } else if ($_GET['error'] == 'wrongpwd') {
                $feedback .= 'Wrong password!';
            } else if ($_GET['error'] == 'emptyfields') {
                $feedback .= 'Empty fields!';
            } else if ($_GET['error'] === 'filetoolarge') { // Profile image upload errors
                $feedback .= 'File too large!';
            } else if ($_GET['error'] === 'filetypeincorrect') { 
                $feedback .= 'File must be JPEG, PNG or GIF!';
            } else if ($_GET['error'] === 'uploaderror') { 
                $feedback .= 'Error uploading file!';
            } else if ($_GET['error'] === 'cannotupdateimg') { 
                $feedback .= 'Cannot update image!';
            } else if ($_GET['error'] === 'blurberror') { // Profile blurb errors
                $feedback .= 'Blurb input error!';
            } else if ($_GET['error'] === 'cannotupdateblurb') { 
                $feedback .= 'Cannot update blurb!';
            } else if ($_GET['error'] === 'cannotdisplayusers') { // Admin
                $feedback .= 'Cannot display users!';
            } else if ($_GET['error'] === 'invaliduserid') { 
                $feedback .= 'Invalid user ID!';
            } else if ($_GET['error'] === 'cannotdeleteuser') { 
                $feedback .= 'Cannot delete user!';
            } 
            $feedback .= '</div>';
        }
           
        if (isset($_GET['feedback'])) {
            $feedback = '<div class="alert alert-success" role="alert">';

            if ($_GET['feedback'] == 'loggedout') {
                $feedback .= 'You have logged out!';
            } else if ($_GET['feedback'] == 'loggedin') {
                $feedback .= 'You have logged in!';
            } else  if ($_GET['feedback'] == 'signedup') {
                $feedback .= 'You have signed up!';
            } else  if ($_GET['feedback'] == 'fileuploaded') {  // Profile image upload 
                $feedback .= 'File uploaded successfully!';
            } else if ($_GET['feedback'] === 'blurbupdated') {  // Profile blurb update
                $feedback .= 'Blurb updated!';
            } 

            $feedback .= '</div>';
        }

        echo $feedback;
    }
}


