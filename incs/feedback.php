<?php

include 'classes/Feedback.php';
$feedback = new Feedback();
$text = $feedback->getFeedback();

if ($text) {
    echo '<div class="feedback">';
    echo $text;
    echo '</div>';
}