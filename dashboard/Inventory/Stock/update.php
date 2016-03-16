<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}
require "C:/xampp/htdocs/easyd/connect.php";

$item = $_POST["name"];
$category = $_POST["category"];
$quantity = $_POST["currentqty"];
$cquantity = $_POST["cqty"];

$sql = "SELECT * FROM stock_details WHERE category='" . $category . "' AND item='" . $item . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$qty = $row["quantity"];
    	$buffer = $row["buffer"];
    }
}
if ($quantity != $qty) {
    die("DO NOT OVERWRITE CURRENT QUANTITY VALUE");
}elseif ($qty <= 0) {
    die("The item you requested has finished.");
}
$new = $quantity - $cquantity;
// if ($new<=$buffer) {
//     echo "nsdkndk";
// }
if ($new < 0) {
    die("Sorry! The quantity you require is not available. Please select a different quantity.");
}
date_default_timezone_set('Asia/Calcutta');
$today = $date = date('Y-m-d H:i:s');
$sql = "INSERT into stock_consumed (item, quantity, time1, category, buffer)
VALUES ('" . $item . "', '" . $quantity . "', '" . $today . "', '" . $category . "', '" . $buffer . "')";
$result = $conn->query($sql);
$quantity = $quantity - $cquantity;
$sql = "UPDATE stock_details SET quantity='" . $quantity . "' WHERE item='" . $item . "' AND category='" . $category . "'";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>