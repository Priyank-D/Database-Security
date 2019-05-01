<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 11:05 PM
 */


include('Config.php');
session_start();
$timestamp = date('Y-m-d h:i:sa');
$login_session = $_SESSION['user'];
$sql= "select LastName, FirstName, Title,HireDate,City,Extension from employee";
$result = mysqli_query($db,$sql);

echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>AM</title>';
echo '<link rel="stylesheet" type="text/css" href="Style.css">';
echo '</head><body>';
echo '<div id ="head: style="text-align: center;"><h2>Welcome </h2>'.$login_session.'</div>';
echo '<div id ="head"><h2>Employees Details</h2></div>';

echo  '<table>';
echo '<tr>';
echo '<th>Last Name</th>';
echo '<th>First Name</th>';
echo '<th>Title</th>';
echo '<th>Hire Date</th>';
echo '<th>City</th>';
echo '<th>Extension</th>';

echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['LastName'] . '</td>';
    echo '<td>' . $row['FirstName'] . '</td>';
    echo '<td>' . $row['Title'] . '</td>';
    echo '<td>' . $row['HireDate'] . '</td>';
    echo '<td>' . $row['City'] . '</td>';
    echo '<td>' . $row['Extension'] . '</td>';
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