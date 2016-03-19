<?php
	session_start();

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$project_name = $_REQUEST["pname"];
	$members = $_REQUEST["memreq"];
	$meet_agenda = $_REQUEST["agenda"];
	$meet_date = $_REQUEST["mdate"];
	$meet_time = $_REQUEST["time"];

	require "C:/xampp/htdocs/easyd/connect.php";

	$sql = "INSERT into meeting_details (project_name, members, meet_agenda, meet_date, meet_time)
	VALUES ('" . $project_name . "', '" . $members . "', '" . $meet_agenda . "', '" . $meet_date . "', '" . $meet_time . "')";

	if ($conn->query($sql) === TRUE) {
		echo "MEETING SAVED";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>