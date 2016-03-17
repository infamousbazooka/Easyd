<?php
	session_start();
	$username = $_SESSION["name"];
	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$prospect_name = $_POST["prospect_name"];
	$firm_name = $_POST["firm_name"];
	$proj_associated = $_POST["proj_associated"];
	$follow_reason = $_POST["follow_reason"];
	$follow_reply = $_POST["follow_reply"];

	require "C:/xampp/htdocs/easyd/connect.php";

	$sql = "UPDATE follow_list SET follow_reason='" . $follow_reason . "', follow_reply='" . $follow_reply . "' WHERE prospect_name='" . $prospect_name . "' AND firm_name='" . $firm_name . "'";
	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>