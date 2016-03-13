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

	$servername = "localhost";
	$uname = "root";
	$pword = "";
	$dbname = "easyd";

	$conn = new mysqli($servername, $uname, $pword, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	date_default_timezone_set('Asia/Calcutta');
	$today = $date = date('Y-m-d');

	$sql = "INSERT into incentive (amount, date1, empid, empname, reason)
	VALUES ('" . $amount . "', '" . $today . "', '" . $username . "', '" . $empname . "', '" . $reason . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>