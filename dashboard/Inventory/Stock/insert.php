<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$item = $_POST["name"];
	$description = $_POST["desc"];
	$category = $_POST["category"];
	$quantity = $_POST["qty"];
	$price = $_POST["price"];
	$purchase_date = $_POST["pur"];
	$buffer = $_POST["buffer"];

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = $date = date('Y-m-d H:i:s');

	$sql = "INSERT into stock_details (item, description, category, quantity, price, purchase_date, buffer)VALUES ('" . $item . "', '" . $description . "', '" . $category . "', '" . $quantity . "', '" . $price . "', '" . $purchase_date . "', '" . $buffer . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>