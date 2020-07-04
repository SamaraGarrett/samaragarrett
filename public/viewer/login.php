<?php
DEFINE('PAGE_TITLE','Login');
require('../header.php');
?>

<div class="container">
    <form class="form-basic" method="post" action="login.php?action=submit">
        <div class="form-title-row">
            <h1>Log In</h1>
        </div>

        <div class="form-group">
            <label for="username">Username: </label>
            <input type="username" id="username" name="username" placeholder="Enter Username"
            value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php

if (isset($_GET['action']) && ($_GET['action'] == 'submit')) {
    if ($_POST['password'] == '' || $_POST['username'] == '') {
        echo 'One or more of the required fields was left blank.';
    } else {
        // get hashed password from database
        $statement = "SELECT * FROM users WHERE username = ?";
        $user = preparedStatementDB('oneRow', $statement, 's', $_POST['username']);
        $dbHashedPassword = $user['password'];

        // verify input password against stored hashed password
        if (password_verify($_POST['password'], $dbHashedPassword)) {
            echo 'password verified';
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_type'] = $user['user_type'];
            session_write_close();

            // return to main page
            redirect(PATH . 'index.php');
        } else {
            echo 'wrong';
        }
    }
}
?>

<?php
require('../footer.php');
?>