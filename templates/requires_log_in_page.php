<?php 
DEFINE('PAGE_TITLE','title'); // replace 'title' with title of page
require('../header.php');

// check that the user is logged in and redirect them to main page if not
if (USER_TYPE < 0) {
    redirect(PATH . 'index.php');
}
?>

<!-- 
    HTML body code goes here
-->
<div class="container">
</div>

<?php
require('../footer.php');
?>