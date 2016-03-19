<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$fname = $_REQUEST["fname"];
	$pname = $_REQUEST["pname"];
	$empname = $_REQUEST["empname"];
	$address = $_REQUEST["address"];
	$task = $_REQUEST["task"];
	$start = $_REQUEST["start"];
	$end = $_REQUEST["end"];
	$time = $_REQUEST["time"];

	require "C:/xampp/htdocs/easyd/connect.php";

	$sql = "INSERT into proj_tasks (empname, firmname, pro_name, task, startdate, enddate, endtime)
	VALUES ('" . $empname . "', '" . $fname . "', '" . $pname . "', '" . $task . "', '" . $start . "', '" . $end . "', '" . $time . "')";

	if ($conn->query($sql) === TRUE) {
		echo "TASK SAVED";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>