<?php 
DEFINE('PAGE_TITLE','Resume');
require('../header.php');
?>

<!-- 
    Attempting to embed pdf into page, rather than view or download according to viewer's
    browser settings. Currently using a different document to test (rather than resume).
-->
<object width="100%" height="1000" data="resources/Team_2_Project_Report.pdf" type="application/pdf">
    <iframe width="100%" src="https://docs.google.com/viewerng/viewer?embedded=true&url=http://samaragarrett.com/resources/Team_2_Project_Report.pdf"></iframe>
</object>

<?php
require('../footer.php');
?>