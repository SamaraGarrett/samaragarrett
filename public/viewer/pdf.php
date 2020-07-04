<?php 
DEFINE('PAGE_TITLE','PDF');
require('../header.php');

if (isset($_GET['title'])) {
    if ($_GET['title'] == 'resume') {
        $file = PATH . '../resources/ResumeSamaraGarrett.pdf'; 
        $filename = 'ResumeSamaraGarrett.pdf';

        DEFINE('PAGE_TITLE','Resume');
    } else if ($_GET['title'] == 'trs') {
        $file = PATH . '../resources/Team_2_Project_Report.pdf'; 
        $filename = 'Team_2_Project_Report.pdf';

        DEFINE('PAGE_TITLE','Tool Rental System Documentation');
    } else {
        // no valid pdf selected
        redirect(PATH . 'index.php');
    }
} else {
    // no pdf selected
    redirect(PATH . 'index.php');
}

// pdf view doesn't work on chrome without this line
ob_clean();

// Header content type 
header('Content-type: application/pdf'); 

header('Content-Disposition: inline; filename="' . $filename . '"'); 

header('Content-Transfer-Encoding: binary'); 

header('Accept-Ranges: bytes'); 

// Read the file 
@readfile($file); 

require('../footer.php');
?> 
  