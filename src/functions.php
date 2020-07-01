<?php
// include configuration (for database parameters)
include_once(PATH . '../config/config.php');

/**
 * function to set current page's nav bar item to active
 * 
 * @param string $pageTitle The page title of the nav bar item
 * @param string $currentPage The page title of the current page
 */
function isActive(string $pageTitle, string $currentPage) {
  if (strcmp($pageTitle, $currentPage) == 0) { 
    return 'active'; 
  }
}

?>