<?php 
DEFINE('PAGE_TITLE','Users'); // replace 'title' with title of page
require('../header.php');

// check that the user is an admin and redirect them to main page if not
if (USER_TYPE != 0) {
    redirect(PATH . 'index.php');
}
?>
<!-- datatables requirements 
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
-->

<!-- 
Datatables scripts and styles
References:
https://datatables.net/
https://www.c-sharpcorner.com/article/using-jquery-datatables-grid-with-asp-net-core-mvc/
 -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet" />  <!-- -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>  <!-- -->
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js "></script>  <!-- -->

<?php
    $statement = "SELECT users.user_id, users.username, user_types.user_type
    FROM users INNER JOIN user_types ON users.user_type = user_types.user_type_id";
    $users = queryDB('multi', $statement);
?>

<table id="users_table" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>User Type</th>
            <th>Edit User</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($users as $user) {
                echo '<tr>';
                echo '<td>' . $user['user_id'] . '</td>';
                echo '<td>' . $user['username'] . '</td>';
                echo '<td>' . $user['user_type'] . '</td>';
                echo '<td><a href="../multiple/account.php?user_id=' . $user['user_id'] . '">Edit</a></td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>

<script type="text/javascript" class="init"> 
    // jquery script to initialize datatable structure
    $("#users_table").DataTable();    
</script> 

<?php
require('../footer.php');
?>