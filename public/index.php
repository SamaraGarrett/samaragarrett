<?php
DEFINE('PAGE_TITLE','Index');
require('header.php');
?>

<div class="container">
    <h1>Welcome to Samara Garrett's Web Page</h1>
    <p>
        <ul style="font-size:large">
            <li>Full-stack web application developer, knowledgeable and proficient in front-end and back-end development.</li>
            <li>Quick learner of new technologies, tools, and processes.</li>
            <li>An effective problem-solver with excellent analytical skills and strong work ethic.</li>
        </ul>
    </p>
    <br>
    <p style="font-size:large"><span style="font-weight:bold">Currently:</span> Looking for opportunities in web development.</p>
    <br>
    <p style="font-size:large">See the <a href='<?php echo PATH ?>viewer/projects.php'>projects</a> I've worked on.</p>
    <p style="font-size:large">View or download my <a href='<?php echo PATH ?>viewer/pdf.php?title=resume'>resume.</a></p>
</div>

<?php
require('footer.php');
?>