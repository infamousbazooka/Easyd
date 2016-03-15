<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
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
}
$quantity = $quantity - $cquantity;
if ($quantity<=$buffer) {
	phpAlert("BUFFER ALERT");
}
$sql = "UPDATE stock_details SET quantity='" . $quantity . "' WHERE item='" . $item . "' AND category='" . $category . "'";
if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
} else {
    die( "Error updating record: " . $conn->error);
}

$conn->close();
?>