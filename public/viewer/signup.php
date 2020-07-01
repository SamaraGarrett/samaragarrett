<?php
DEFINE('PAGE_TITLE','Sign Up');
require('../header.php');
?>

<div class="container">
    <form class="form-basic" method="post" action="signup.php?action=submit">
        <div class="form-title-row">
            <h1>Sign Up</h1>
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
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //echo 'hashed password: ' . $hashed_password;
        //echo 'username: ' . $_POST['username'];
        //echo 'password: ' . $_POST['password'];

        $statement = "INSERT INTO users (username, password) VALUES (?, ?)";
        preparedStatementDB('none', $statement, 'ss', $_POST['username'], $hashed_password);
        echo 'SUCESS';
    }
}
?>

<?php
require('../footer.php');
?>