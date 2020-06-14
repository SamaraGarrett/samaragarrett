<?php
DEFINE('PAGE_TITLE','Projects');
require('header.php');

session_start();
?>

<div class="container">
    <h1>Tool Rental System</h1>
    <p>ASP.NET Core and MySQL three-tier web application.</p>
    <p>Metropolitan State University Bachelor of Science in Computer Science Capstone Project.
    Built application from the ground up with a group of four other students.</p>
    <ul>
        <li>Designed the Use Case and Class Diagrams for the project.</li>
        <li>Managed team, inluding assigning tasks and monitoring progress.</li>
        <li>Recorded minutes for twice weekly meeting and compiled them online to be referenced by group.</li>
        <li>Collaborated on database design.</li>
        <li>Implemented several use cases, including Rent Out Tool, Return Tool, and display and search of tables (using jQuery DataTables).</li>
    </ul>
    <p>Link to github for project: <a href="https://github.com/lancefox1979/ToolRentalSystem.Web">Tool Registration System</a>. My commits are under the GitHub account SamaraEGarrett.</p>
    <?php
        // set the file location and name for the project documentation
        $_SESSION['file'] = 'resources/Team_2_Project_Report.pdf'; 
        $_SESSION['filename'] = 'Team_2_Project_Report.pdf';
    ?>
    <p>See the project documentation pdf: <a href="pdf.php">Tool Rental System Documentation</a></p>
    <p>A demo on this project can be shown on my local machine through Zoom screenshare on request.</p>
</div>

<div class="container">
    <h1>SILC Registration System</h1>
    <p>Website for class registration for the School of Indian Languages and Culture (SILC). Link to website: <a href="https://silc.thisisjava.com/">SILC Registration System</a>.</p>
    <p>PHP and MySQL three-tier web application</p>
    <p>Worked on version 4.0:</p>
    <ul>
        <li>Discovered and fixed a bug that had caused important records to be deleted.</li>
        <li>Other bug fixes:
            <ul>
                <li>display of registered classes and balance due</li>
                <li>adjustments to display of data so that it fit logic requirements given by supervisor</li> 
                <li>fixed confirmation email behavior for registration</li>
            </ul>
        </li>
        <li>Enhancements to existing pages:
            <ul>
                <li>auto-sort data by last name</li>
                <li>added visual indicators for paid/unpaid buttons</li>
                <li>created and formatted a printable report of data</li>
                <li>added detail to summaries of various pages</li>
                <li>added recover password functionality</li>
            </ul>
        </li>
    </ul>
</div>

<?php
require('footer.php');
?>