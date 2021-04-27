<?php
DEFINE('PAGE_TITLE','Projects');
require('../header.php');
?>

<div class="container">
    <h1>Telugu Puzzles</h1>
    <h4>Full Stack Web Developer, Dec 2020 - Present</h4>
    <p>Website for creation and sharing of puzzles in Telugu. Link to website: <a href="https://telugupuzzles.com/">Telugu Puzzles</a>.</p>
    <p>PHP and MySQL three-tier web application</p>
    <ul>
        <li><div style="font-weight:bold">Enhancements:</div>
            <ul>
                <li>Restructured puzzle folder structure and adjusted all relevant functions accordingly.</li>
                <li>Designed and implemented Single Sign-on for several puzzle applications (subdomains) hosted under a single parent application (primary domain).</li>
                <li>Enhanced user administration (add, update, delete, role management).</li>
                <li>Implemented user authentication (login, logout, forgot password).</li>
                <li>Enhanced puzzle, apps, and books management (CRUD operations, filters).</li>
                <li>Provided summary reports for end-users and administrators.</li>
                <li>Enabled PayPal integration for puzzle book sponsorship.</li>
                <li>Streamlined the deployment and development processes for offline (localhost) and online (Bluehost) hosting.</li>
                <li>Developed the "Catch A Phrase" puzzle application, <a href='http://cap.telugupuzzles.com'>cap.telugupuzzles.com</a></li>
                <li>Hosted the enhancements to bluehost.com on a regular basis.</li>
            </ul>
        </li>
        <li><div style="font-weight:bold">Bug fixes:</div>
            <ul>
                <li>Fixed session bugs caused by session_start not being at the top of the pages.</li>
                <li>Adjusted several database foreign key 'on update' constraints to allow for deletion of parent records.</li>
            </ul>
        </li>
    </ul>
</div>

<div class="container">
    <h1>SILC Registration System</h1>
    <h4>Web Developer, May 2019 – August 2019 and July 2020 – December 2020</h4>
    <p>Website for class registration for the School of Indian Languages and Culture (SILC). Link to website: <a href="https://silc.thisisjava.com/">SILC Registration System</a>.</p>
    <p>PHP and MySQL three-tier web application</p>
    <p>Developed version 4.0 and supported the rollout of the enhanced registration system during the school year 2020-21.</p>
    <ul>
        <li><div style="font-weight:bold">Enhancements:</div>
            <ul>
                <li>Auto-sort data by last name.</li>
                <li>Added visual indicators for paid/unpaid buttons.</li>
                <li>Created and formatted a printable report of data.</li>
                <li>Added detail to summaries of various pages.</li>
                <li>Implemented codeless configuration to allow class roster access for administrators and teachers.</li>
                <li>Developed the tracking mechanism for the sources of registration.</li>
                <li>Enabled several reports (fees paid, fees due, household reports) for administrators.</li>
                <li>Implemented role-based access control (admin, super-admin, treasurer).</li>
                <li>Designed and implemented PayPal integration for registration fee collection.</li>
            </ul>
        </li>
        <li><div style="font-weight:bold">Bug fixes:</div>
            <ul>
                <li>Discovered and fixed a query that had been deleting historical records.</li>
                <li>Fix to redirect after hosting website changes broke core functionality.</li>
                <li>Corrected display of registered classes and registration costs.</li>
                <li>Adjustments to display of data so that it fit logic requirements given by supervisor.</li> 
            </ul>
        </li>
    </ul>
</div>

<div class="container">
    <h1>This Website (samaragarrett.com)</h1>
    <p>PHP and MySQL three-tier web application.</p>
    <ul>
        <li>Designed and implemented web application, including structure, style, and database.</li>
        <li>Implemented role based access control.</li>
    </ul>
    <p>Link to github for project: <a href="https://github.com/SamaraGarrett/samaragarrett">Samara Garrett</a>.</p>
</div>

<div class="container">
    <h1>Tool Rental System</h1>
    <h4>January 2020 – May 2020</h4>
    <p>ASP.NET Core and MySQL three-tier web application.</p>
    <p>Capstone Project for Metropolitan State University Bachelor of Science in Computer Science.
    Built application from the ground up with a group of four other students.</p>
    <ul>
        <li>Collaborated with team on design of website look, structure, and database.</li>
        <li>Designed the Use Case and Class Diagrams for the project.</li>
        <li>Managed team, including assigning tasks and monitoring progress.</li>
        <li>Recorded minutes for twice weekly meeting and compiled them online to be referenced by group.</li>
        <li>Implemented several use cases, including Rent Out Tool, Return Tool, and display and search of tables (using jQuery DataTables).</li>
    </ul>
    <p>Link to github for project: <a href="https://github.com/lancefox1979/ToolRentalSystem.Web">Tool Registration System</a>. My commits are under the GitHub account SamaraEGarrett.</p>
    <p>See the project documentation pdf: <a href="pdf.php?title=trs">Tool Rental System Documentation</a></p>
    <?php /*<p>A demo of this project can be shown on my local machine through Zoom screenshare upon request.</p>*/ ?>
</div>

<?php
require('../footer.php');
?>