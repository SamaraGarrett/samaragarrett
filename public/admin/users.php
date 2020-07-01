<?php 
DEFINE('PAGE_TITLE','Users'); // replace 'title' with title of page
require('../header.php');

// check that the user is an admin and redirect them to main page if not
if (USER_TYPE != 0) {
    header('Location: ' . PATH . 'index.php');
}
?>

<!-- 
    HTML body code goes here
-->

<?php
require('../footer.php');
?>