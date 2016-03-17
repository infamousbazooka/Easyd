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
	$leadtype = $_POST["leadtype"];

	
	require "C:/xampp/htdocs/easyd/connect.php";

	if ($leadtype == 'new') {
		$sql = "INSERT into follow_list (prospect_name, firm_name, proj_associated, follow_reason, entered_by, entry_time, follow_reply)
		VALUES ('" . $prospect_name . "', '" . $firm_name . "', '" . $proj_associated . "', '" . $follow_reason . "', '" . $username . "', '" . $time . "', '" . $follow_reply . "')";
	} else{
		$sql = "UPDATE follow_list SET firm_name='" . $firm_name . "', proj_associated='" . $proj_associated . "', follow_reason='" . $follow_reason . "', follow_reply='" . $follow_reply . "', entered_by='" . $username . "', entry_time='" . $time . "', WHERE prospect_name='" . $prospect_name . "'";
	}
	

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>