<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 11:19 PM
 */



include('Config.php');
session_start();
$timestamp = date('Y-m-d h:i:sa');
$login_session = $_SESSION['user'];
$sql= "select orders.OrderID,products.ProductName,orders.OrderDate,orders.ShippedDate,orders.ShipCity,orders.ShipCountry,
products.UnitsInStock,products.UnitsOnOrder,products.Discontinued
from orders join order_details on orders.OrderID=order_details.OrderID
join products on order_details.ProductID=products.ProductID";
$result = mysqli_query($db,$sql);

echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>AM</title>';
echo '<link rel="stylesheet" type="text/css" href="Style.css">';
echo '</head><body>';
echo '<div id ="head: style="text-align: center;"><h2>Welcome </h2>'.$login_session.'</div>';
echo '<div id ="head"><h2>Below are the 7Product Details</h2></div>';

echo  '<table>';
echo '<tr>';
echo '<th>Order ID</th>';
echo '<th>Product Name</th>';
echo '<th>Order Date</th>';
echo '<th>Shipped Date</th>';
echo '<th>Ship City</th>';
echo '<th>Ship Country</th>';
echo '<th>Unit in Stock</th>';
echo '<th>Unit on Order</th>';
echo '<th>Discontinued</th>';

echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['OrderID'] . '</td>';
    echo '<td>' . $row['ProductName'] . '</td>';
    echo '<td>' . $row['OrderDate'] . '</td>';
    echo '<td>' . $row['ShippedDate'] . '</td>';
    echo '<td>' . $row['ShipCity'] . '</td>';
    echo '<td>' . $row['ShipCountry'] . '</td>';
    echo '<td>' . $row['UnitsInStock'] . '</td>';
    echo '<td>' . $row['UnitsOnOrder'] . '</td>';
    echo '<td>' . $row['Discontinued'] . '</td>';

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