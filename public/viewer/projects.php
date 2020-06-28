<?php
DEFINE('PAGE_TITLE','Projects');
require('../header.php');

session_start();
?>

<div class="container">
    <h1>This Website</h1>
    <p>PHP <!-- and MySQL three-tier (in development)-->web application.</p>
    <ul>
        <li>Designed and implemented web application.</li>
    </ul>
    <p>Link to github for project: <a href="https://github.com/SamaraGarrett/samaragarrett">Samara Garrett</a>.</p>
</div>

<div class="container">
    <h1>Tool Rental System</h1>
    <p>ASP.NET Core and MySQL three-tier web application.</p>
    <p>Capstone Project for Metropolitan State University Bachelor of Science in Computer Science.
    Built application from the ground up with a group of four other students.</p>
    <ul>
        <li>Collaborated with team on design of website look, structure, and database.</li>
        <li>Designed the Use Case and Class Diagrams for the project.</li>
        <li>Managed team, inluding assigning tasks and monitoring progress.</li>
        <li>Recorded minutes for twice weekly meeting and compiled them online to be referenced by group.</li>
        <li>Implemented several use cases, including Rent Out Tool, Return Tool, and display and search of tables (using jQuery DataTables).</li>
    </ul>
    <p>Link to github for project: <a href="https://github.com/lancefox1979/ToolRentalSystem.Web">Tool Registration System</a>. My commits are under the GitHub account SamaraEGarrett.</p>
    <?php
        // set the file location and name for the project documentation
        $_SESSION['file'] = 'resources/Team_2_Project_Report.pdf'; 
        $_SESSION['filename'] = 'Team_2_Project_Report.pdf';
    ?>
    <p>See the project documentation pdf: <a href="pdf.php">Tool Rental System Documentation</a></p>
    <p>A demo of this project can be shown on my local machine through Zoom screenshare upon request.</p>
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
                <li>Corrected display of registered classes and registration costs.</li>
                <li>Adjustments to display of data so that it fit logic requirements given by supervisor.</li> 
                <li>Fixed confirmation email behavior for registration.</li>
            </ul>
        </li>
        <li>Enhancements to existing pages:
            <ul>
                <li>Auto-sort data by last name.</li>
                <li>Added visual indicators for paid/unpaid buttons.</li>
                <li>Created and formatted a printable report of data.</li>
                <li>Added detail to summaries of various pages.</li>
                <li>Added recover password functionality.</li>
            </ul>
        </li>
    </ul>
</div>
<br>
<br>

<?php
require('../footer.php');
?>