<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/23/2019
 * Time: 12:20 AM
 */




include('Config.php');
session_start();
date_default_timezone_set("America/Chicago");
echo "You have logged in at " . date("M,d,Y h:i:s A")." !!!";
$login_session = $_SESSION['user'];
$sqlLastLogin= "select LoginTime from system_users where u_username='$login_session'";

$resultLastLogin = mysqli_query($db,	$sqlLastLogin);
while ($row = $resultLastLogin->fetch_assoc()) {
            $LastLogin = $row['LoginTime'];
        }


$sqlLogin= "UPDATE system_users SET LoginTime=NOW() where u_username='$login_session'";
$resultLogin = mysqli_query($db,$sqlLogin);

$sql= "select products.ProductName,products.QuantityPerUnit,products.UnitPrice,products.UnitsInStock,
categories.CategoryName,categories.Description
from products join categories on products.CategoryID=categories.CategoryID;";
$result = mysqli_query($db,$sql);

echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>AM</title>';
echo '<link rel="stylesheet" type="text/css" href="Style.css">';
echo '</head>';
echo '<style> 
p.dashed {border: 1px solid black;
  margin-top: 30px;
  margin-bottom: 50px;
  margin-right: 400px;
  margin-left: 5px;
  padding: 25px;
  background-color: lightblue;}
</style>';
echo '<body>';
echo '<div id ="head: style="text-align: center;"><h2>Welcome <u>'.$login_session.'! </u> </h2></div>';
echo '<p> The last time you logged in is <span style="color: red">'.$LastLogin.'</span>. If this was not by you then please contact Admin.</p>';
echo '<p class="dashed">******** This system is for the use of users only.
Individuals using this computer system without
authority, or in excess of their authority, are subject
to having all of their activities on this system
monitored and recorded by system personnel.
In the course of monitoring individuals improperly using this
system, or in the course of system maintenance, the
activities of authorized users may also be monitored. 
Anyone using this system expressly consents to such
monitoring and is advised that if such monitoring
reveals possible evidence of criminal activity, system
personnel may provide the evidence of such monitoring
to law enforcement officials. **********</div>';
echo '<div id ="head"><h2>List of all the Products</h2></div>';

echo  '<table>';
echo '<tr>';
echo '<th>ProductName</th>';
echo '<th>Quantity Per Unit</th>';
echo '<th>Unit Price</th>';
echo '<th>Units In Stock</th>';
echo '<th>CategoryName</th>';
echo '<th>Description</th>';

echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['ProductName'] . '</td>';
    echo '<td>' . $row['QuantityPerUnit'] . '</td>';
    echo '<td>' . $row['UnitPrice'] . '</td>';
    echo '<td>' . $row['UnitsInStock'] . '</td>';
    echo '<td>' . $row['CategoryName'] . '</td>';
    echo '<td>' . $row['Description'] . '</td>';

    echo '</tr>';
}
echo '</table>';
echo '</body></html>';
?>
<html">

<head>
</head>

<body>
<br>
<br>
<h3 align=center>For any queries please Contact the Admin</h3>
<center>
    <form action="https://formspree.io/vselvam1@hawk.iit.edu" method="POST" name="sentMessage" id="contactForm" margin=center >
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" placeholder="Name" required="required">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">Send Message</button>
    </form>
</center>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>