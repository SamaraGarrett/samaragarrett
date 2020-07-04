<?php
DEFINE('PAGE_TITLE','Sign Up');
require('../header.php');

?>

<div class="container">

<?php
if (isset($_GET['action']) && ($_GET['action'] == 'submit')) {
    if ($_POST['password'] == '' || $_POST['username'] == '') {
        // one of the inputs was blank
        echo 'One or more of the required fields was left blank.';
    } else {
        // hash password
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // create user in database
        $statement = "INSERT INTO users (username, password) VALUES (?, ?)";
        preparedStatementDB('none', $statement, 'ss', $_POST['username'], $hashed_password);
        echo '<h3 style="color:green">Sign Up Successful!</h3>';
    }
}
?>

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
require('../footer.php');
?>