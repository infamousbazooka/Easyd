<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$firmname = $_POST["name"];
	$firmadd = $_POST["address"];
	$firmsector = $_POST["sector"];
	$meeting_reason = $_POST["reason"];
	$pro_name = $_POST["pname"];
	$pro_desc = $_POST["pdesc"];
	$conclusion = $_POST["conc"];

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d H:i:s');

	$sql = "INSERT into pre_project (firmname, firmadd, firmsector, meeting_reason, pro_name, pro_desc, conclusion, empname, timeid, pro_status)
	VALUES ('" . $firmname . "', '" . $firmadd . "', '" . $firmsector . "', '" . $meeting_reason . "', '" . $pro_name . "', '" . $pro_desc . "', '" . $conclusion . "', '" . $name . "', '" . $today . "', 'Pending')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>