<?php
	session_start();

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$fname = $_REQUEST["fname"];
	$empid = $_REQUEST["pass"];
	$pass = $_REQUEST["pass"];
	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d H:i:s');

	$sql = "INSERT into registration_sftwre (name, password, empid, time1)
	VALUES ('" . $fname . "', '" . $pass . "', '" . $empid . "', '" . $today . "')";

	if ($conn->query($sql) === TRUE) {
		echo "REGISTRATION SUCCESSFUL";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>