<?php
	session_start();
	$username = $_SESSION["username"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$name = $_POST["name"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$contact = $_POST["contact"];
	$bank = $_POST["bank"];
	$post = $_POST["posttype"];
	$dob = $_POST["dob"];
	$join = $_POST["join"];
	

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d');
	$time = date('H:i:s');

	$sql = "INSERT into employee_detail (empid, name, email_id, category, address, join_date, contact, time1, dob, bank)
	VALUES ('" . $username . "', '" . $name . "', '" . $email . "', '" . $post . "', '" . $address . "', '" . $today . "', '" . $contact . "', '" . $time . "', '" . $dob . "', '" . $bank . "')";

	if ($conn->query($sql) === TRUE) {
		header('Location: ../../');;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>