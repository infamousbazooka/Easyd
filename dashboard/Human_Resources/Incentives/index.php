<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$empname = $_POST["empname"];
	$amount = $_POST["amount"];
	$reason = $_POST["reason"];

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d');

	$sql = "INSERT into incentive (amount, date1, empid, empname, reason)
	VALUES ('" . $amount . "', '" . $today . "', '" . $username . "', '" . $empname . "', '" . $reason . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>