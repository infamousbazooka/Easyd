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

	$servername = "localhost";
	$uname = "root";
	$pword = "";
	$dbname = "easyd";

	$conn = new mysqli($servername, $uname, $pword, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT into meeting_details (project_name, members, meet_agenda, meet_date, meet_time, meet_minutes)
	VALUES ('" . $project_name . "', '" . $members . "', '" . $meet_agenda . "', '" . $meet_date . "', '" . $meet_time . "', '" . $meet_minutes . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>