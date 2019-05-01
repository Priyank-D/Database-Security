<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/23/2019
 * Time: 12:20 AM
 */




include('Config.php');
session_start();
$timestamp = date('Y-m-d h:i:sa');
$login_session = $_SESSION['user'];
$sql= "select products.ProductName,products.QuantityPerUnit,products.UnitPrice,products.UnitsInStock,
categories.CategoryName,categories.Description
from products join categories on products.CategoryID=categories.CategoryID;";
$result = mysqli_query($db,$sql);

echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>AM</title>';
echo '<link rel="stylesheet" type="text/css" href="Style.css">';
echo '</head><body>';
echo '<div id ="head: style="text-align: center;"><h2>Welcome </h2>'.$login_session.'</div>';
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
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>