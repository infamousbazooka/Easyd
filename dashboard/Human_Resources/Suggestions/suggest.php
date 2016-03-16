<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$complaint = $_POST["compl"];

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d H:i:s');

	$sql = "INSERT into complaints (empid, empname, complaint, time1, remarks)
	VALUES ('" . $username . "', '" . $name . "', '" . $complaint . "', '" . $today . "', 'Yet to Answer')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>