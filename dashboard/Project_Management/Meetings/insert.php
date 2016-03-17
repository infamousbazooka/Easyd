<?php
	session_start();

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$project_name = $_POST["pname"];
	$members = $_POST["memreq"];
	$meet_agenda = $_POST["agenda"];
	$meet_date = $_POST["mdate"];
	$meet_time = $_POST["time"];
	$meet_minutes = $_POST["minutes"];

	require "C:/xampp/htdocs/easyd/connect.php";

	$sql = "INSERT into meeting_details (project_name, members, meet_agenda, meet_date, meet_time, meet_minutes)
	VALUES ('" . $project_name . "', '" . $members . "', '" . $meet_agenda . "', '" . $meet_date . "', '" . $meet_time . "', '" . $meet_minutes . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>