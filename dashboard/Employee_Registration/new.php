<?php
	session_start();

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$name = $_POST["name"];
	$password = $_POST["pass"];
	$rpass = $_POST["rpass"];
	$empid = $_POST["empid"];
	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d H:i:s');

	$sql = "INSERT into registration_sftwre (name, password, empid, time1)
	VALUES ('" . $name . "', '" . $password . "', '" . $empid . "', '" . $today . "')";

	if ($conn->query($sql) === TRUE) {
		header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>