<?php 
if (isset($_GET['user_id'])) {
    // different page title for admin so that navbar highlights correctly
    DEFINE('PAGE_TITLE','Edit User');
} else {
    DEFINE('PAGE_TITLE','Manage Account');
}   
require('../header.php');

if (isset($_GET['user_id'])) {
    if (USER_TYPE != 0) { // only admin is allowed to change user information that is not their own
        redirect(PATH . 'index.php');
    } else {
        $user_id = $_GET['user_id'];
        $admin = TRUE;
    }
} else if (isset($_SESSION['user_id']) && USER_TYPE != 2) {
    // user can edit their own information
    $user_id = $_SESSION['user_id'];
    $admin = FALSE;
} else {
    // demo users do not have permission to edit the account
    if (USER_TYPE == 2) {
        $_SESSION['message'] = 'This feature is not available for demo users.';
    }

    redirect(PATH . 'index.php');
}

// get user types
$statement = "SELECT user_type_id, user_type FROM user_types";
$userTypes = queryDB('multi', $statement);
$statement = ''; // clear out statement to user again

// get user information
$statement = "SELECT user_id, username, password, user_type FROM users WHERE user_id = ?";
$user = preparedStatementDB('oneRow', $statement, 'i', $user_id);
$statement = ''; // clear out statement to user again

// no user found in database
if (!$user) {
    $_SESSION['message'] = 'This user was not found in the database.';
    redirect(PATH . 'admin/users.php');
}

// result messages
$username_message = '';
$password_message = '';
$user_type_message = '';
if (isset($_GET['change'])) {
    if ($_GET['change'] == 'username') {
        if (isset($_POST['username'])) {
            if ($_POST['username'] == $user['username']) {
                // username entered was the same as current username
                $username_message = '<h3 style="color:red">No changes were made to username.</h3>';
            } else if ($_POST['username'] == NULL) {
                // no username entered
                $username_message = '<h3 style="color:red">Please enter a username.</h3>';
            } else {
                // change username
                $statement = "UPDATE users SET username = ? WHERE user_id = ?";
                preparedStatementDB('none', $statement, 'si', $_POST['username'], $user_id);

                // reload page
                redirect('account.php?' . ($admin ? 'user_id=' . $user_id . '&' : '') . 'change=username');
            }
        } else {
            // success message
            $username_message = '<h3 style="color:green">Change successful!</h3>';
        }
    } else if ($_GET['change'] == 'password') {
        if (isset($_POST['password0'])) {
            if ($_POST['password0'] != $_POST['password1']) {
                // passwords entered did not match each other
                $password_message = '<h3 style="color:red">Passwords do not match.</h3>';
            } else if ($_POST['password0'] == NULL) {
                // no password entered
                $password_message = '<h3 style="color:red">Please enter a password.</h3>';
            } else {
                if (password_verify($_POST['password0'], $user['password'])) {
                    // input password and stored password are the same
                    $password_message = '<h3 style="color:red">Please choose a password different from your current password.</h3>';
                } else {
                    // change password
                    $hashed_password = password_hash($_POST['password0'], PASSWORD_DEFAULT);
                    $statement = 'UPDATE users SET password = ? WHERE user_id = ?';
                    preparedStatementDB('none', $statement, 'si', $hashed_password, $user_id);
                    redirect('account.php?' . ($admin ? 'user_id=' . $user_id . '&' : '') . 'change=password');
                }
            }
        } else {
            // success message
            $password_message = '<h3 style="color:green">Change successful!</h3>';
        }
    } else if ($_GET['change'] == 'user_type' && $admin) { // only admin can edit user type
        if (isset($_POST['user_type'])) {
            if ($_POST['user_type'] == $user['user_type']) {
                // user type entered the same as current user type
                $user_type_message = '<h3 style="color:red">No changes were made to user type.</h3>';
            } else if ($_POST['user_type'] == NULL) {
                // no user type entered (how did they get here?)
                $user_type_message = '<h3 style="color:red">Please enter a user type.</h3>';
            } else {
                // change user type
                $statement = "UPDATE users SET user_type = ? WHERE user_id = ?";
                preparedStatementDB('none', $statement, 'ii', $_POST['user_type'], $user_id);

                // reload page
                redirect('account.php?' . ($admin ? 'user_id=' . $user_id . '&' : '') . 'change=user_type');
            }
        } else {
            // success message
            $user_type_message = '<h3 style="color:green">Change successful!</h3>';
        }
    }   
}

echo '<div class="container">';

if ($admin) {
    echo '<h3><a href="' . PATH . 'admin/users.php">Back to Users Page</a></h3>';
}
?>

    <?php if ($admin) { ?>
    <h1>Edit User with User ID of <?php echo $user_id; ?></h1>
    <?php } else { ?>
    <h1>Manage Account</h1> 
    <?php } ?>

    <form class="form-basic" method="post" action="account.php?<?php echo ($admin ? 'user_id=' . $user_id . '&': ''); ?>change=username">
        <div class="form-title-row">
            <h2>Edit Username</h2>
        </div>

        <?php echo $username_message; ?>

        <div class="form-group">
            <label for="username">Username: </label>
            <input type="username" id="username" name="username" placeholder="Enter Username"
            value="<?php echo $user['username']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Change Username</button>
    </form>

    <br>

    <form class="form-basic" method="post" action="account.php?<?php echo ($admin ? 'user_id=' . $user_id . '&': ''); ?>change=password">
        <div class="form-title-row">
            <h2>Edit Password</h2>
        </div>

        <?php echo $password_message; ?>

        <div class="form-group">
            <label for="password0">New Password: </label>
            <input type="password" id="password0" name="password0" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="password1">Re-type New Password: </label>
            <input type="password" id="password1" name="password1" placeholder="Re-type Password">
        </div>

        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>

    <br>
<?php if ($admin) { // only admin can edit user type ?>
    <form class="form-basic" method="post" action="account.php?<?php echo ($admin ? 'user_id=' . $user_id . '&': ''); ?>change=user_type">
        <div class="form-title-row">
            <h2>Edit User Type</h2>
        </div>

        <?php echo $user_type_message; ?>

        <div class="form-group">
            <label for="user_type">User Type: </label>
            <select name="user_type" id="user_type">
                <?php
                    foreach($userTypes as $userType) {
                        $select = '';
                        if ($userType['user_type_id'] == $user['user_type']) {
                            // set user's type as selected
                            $select = ' selected="selected"';
                        }
                        echo '<option value="' . $userType['user_type_id'] . '"' . $select . '>' . $userType['user_type'] . '</option>';
                    }
                ?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Change User Type</button>
    </form>
<?php } ?>
</div>

<?php
require('../footer.php');
?>