<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 7:21 PM
 */
include('Config.php');
session_start();
$timestamp = date('Y-m-d h:i:sa');
$login_session = $_SESSION['user'];
$sql= "select * from system_users";
$result = mysqli_query($db,$sql);


echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>Admin</title>';
echo '<link rel="stylesheet" type="text/css" href="Style.css">';
echo '</head><body>';
echo '<div id ="head: style="text-align: center;"><h2>Welcome </h2>'.$login_session.'</div>';
echo '<div id ="head"><h2>Users & Roles</h2></div>';

echo  '<table>';
echo '<tr>';
echo '<th>User Name</th>';
echo '<th>Role</th>';

echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['u_username'] . '</td>';
    echo '<td>' . $row['u_rolecode'] . '</td>';
    echo '</tr>';
}
echo '</table>';
echo '</body></html>';
//$_SESSION['role_code'] = $rolecode;
?>
<html">

<head>
</head>

<body>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>