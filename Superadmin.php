<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 10:10 PM
 */

include('Config.php');
session_start();
$timestamp = date('Y-m-d h:i:sa');
$login_session = $_SESSION['user'];
$sql= "SELECT system_users.u_username, role.role_rolename, role_rights.rr_create,role_rights.rr_delete,role_rights.rr_edit,
role_rights.rr_view
FROM system_users join role ON system_users.u_rolecode = role.role_rolecode
join role_rights ON role.role_rolecode = role_rights.rr_rolecode";
$result = mysqli_query($db,$sql);

echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>AM</title>';
echo '<link rel="stylesheet" type="text/css" href="Style.css">';
echo '</head><body>';
echo '<div id ="head: style="text-align: center;"><h2>Welcome </h2>'.$login_session.'</div>';
echo '<div id ="head"><h2>Users & Roles</h2></div>';

echo  '<table>';
echo '<tr>';
echo '<th>User Name</th>';
echo '<th>Role</th>';
echo '<th>Create</th>';
echo '<th>Delete</th>';
echo '<th>Edit</th>';
echo '<th>View</th>';
echo '<th>Delete the Users</th>';

echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['u_username'] . '</td>';
    echo '<td>' . $row['role_rolename'] . '</td>';
    echo '<td>' . $row['rr_create'] . '</td>';
    echo '<td>' . $row['rr_delete'] . '</td>';
    echo '<td>' . $row['rr_edit'] . '</td>';
    echo '<td>' . $row['rr_view'] . '</td>';
    $usname=$row['u_username'];
    echo '<td><a href=delete.php?id='.$usname.'>Delete</a></td>';
    echo '</tr>';
}
echo '</table>';
echo '</body></html>';
?>
<html">

<head>
</head>

<body>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>