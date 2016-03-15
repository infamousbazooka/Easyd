<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$firmname = $_POST["firmname"];
	$projectname = $_POST["projectname"];
	$status = $_POST["status"];

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d H:i:s');

	$sql = "UPDATE pre_project SET pro_status='" . $status . "' WHERE firmname='" . $firmname . "' AND pro_name='" . $projectname . "'";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>