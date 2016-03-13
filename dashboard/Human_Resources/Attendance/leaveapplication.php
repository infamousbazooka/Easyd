<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$from = $_POST["from"];
	$to = $_POST["to"];
	$reason = $_POST["reason"];

	$servername = "localhost";
	$uname = "root";
	$pword = "";
	$dbname = "easyd";

	$conn = new mysqli($servername, $uname, $pword, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$date1 = new DateTime($from);
	$date2 = new DateTime($to);
	$diff = $date1->diff($date2);
	$days = $diff->format('%a');
	date_default_timezone_set('Asia/Calcutta');
	$today = $date = date('Y-m-d');

	$sql = "INSERT into leave_applications (empid, empname, from1, to1, application_date, approval_status, reason, num_days)VALUES ('" . $username . "', '" . $name . "', '" . $from . "', '" . $to . "', '" . $today . "', 'pending', '" . $reason . "', '" . $days . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>