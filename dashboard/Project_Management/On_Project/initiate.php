<?php
	session_start();

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$client_name = $_POST["firmname"];
	$pname = $_POST["projectname"];
	$leader = $_POST["leader"];
	$team_members = $_POST["members"];
	$pdescription = $_POST["description"];
	$pstartdate = $_POST["start"];
	$penddate = $_POST["end"];

	
	require "C:/xampp/htdocs/easyd/connect.php";
	$sql = "INSERT into project (pname, client_name, leader, team_members, pdescription, pstartdate, penddate)
	VALUES ('" . $pname . "', '" . $client_name . "', '" . $leader . "', '" . $team_members . "', '" . $pdescription . "', '" . $pstartdate . "', '" . $penddate . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>