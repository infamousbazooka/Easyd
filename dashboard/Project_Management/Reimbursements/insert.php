<?php
	session_start();
	$username = $_SESSION["name"];
	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$periodfrom = $_POST["periodfrom"];
	$periodto = $_POST["periodto"];
	$expense_type = $_POST["bill"];
	$expense_nature = $_POST["nature"];
	$mode = $_POST["mode"];
	$days = $_POST["days"];
	$distance = $_POST["distance"];
	$price = $_POST["price"];
	$amount = $_POST["amount"];
	$invoice_no = $_POST["invoice"];
	$details = $_POST["details"];

	
	require "C:/xampp/htdocs/easyd/connect.php";
	$today = date('Y-m-d H:i:s');

	$sql = "INSERT into reimburse_expenses (empname, date_from, date_to, expense_type, expense_nature, mode, days, distance, price, amount, invoice_no, details)
	VALUES ('" . $username . "', '" . $periodfrom . "', '" . $periodto . "', '" . $expense_type . "', '" . $expense_nature . "', '" . $mode . "', '" . $days . "', '" . $distance . "', '" . $price . "', '" . $amount . "', '" . $invoice_no . "', '" . $details . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>