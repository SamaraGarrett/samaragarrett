<?php 
DEFINE('PAGE_TITLE','PDF');
require('../header.php');

session_start();
  
// Store the file name into variable 
$file = $_SESSION['file']; 
$filename = $_SESSION['filename']; 

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
  