<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];
	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$pname = $_REQUEST["pname"];
	$fname = $_REQUEST["fname"];
	$email = $_REQUEST["email"];
	$address = $_REQUEST["address"];
	$phone = $_REQUEST["phone"];
	$proname = $_REQUEST["proname"];
	$sector = $_REQUEST["sector"];
	$designation = $_REQUEST["designation"];
	$follow_reason = $_REQUEST["followreason"];
	$follow_reply = $_REQUEST["followreply"];
	$leadtype = $_REQUEST["type"];

	date_default_timezone_set('Asia/Calcutta');
	$time = date('Y-m-d H:i:s');

	require "C:/xampp/htdocs/easyd/connect.php";
	if ($leadtype == 'new') {
		$sql = "INSERT into clients (name, firm_name, desig, email, address, phone1,
			proj_associated, entered_by, entry_time, sector)
			VALUES ('" . $pname . "', '" . $fname . "', '" . $designation . "', '" . $email . "', '" . $address . "', 
				'" . $phone . "', '" . $proname . "', '" . $name . "',
				'" . $time . "', '" . $sector . "')";
		if ($conn->query($sql) === TRUE) {
			echo "<h4>NEW CLIENT WAS ADDED</h4>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	$sql = "INSERT into follow_list (prospect_name, firm_name, proj_associated, follow_reason, entered_by, entry_time, follow_reply)
		VALUES ('" . $pname . "', '" . $fname . "', '" . $proname . "', '" . $follow_reason . "', '" . $name . "', '" . $time . "', '" . $follow_reply . "')";

	if ($conn->query($sql) === TRUE) {
		echo "<h4>DATA RECORDED SUCESSFULLY</h4>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>