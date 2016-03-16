<?php
	session_start();
	$username = $_SESSION["name"];
	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$name = $_POST["name"];
	$firm_name = $_POST["firm_name"];
	$desig = $_POST["desig"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$phone1 = $_POST["contact"];
	$proj_associated = $_POST["proj_associated"];
	$service = $_POST["service"];
	$comments = $_POST["comments"];
	$sector = $_POST["sector"];
	
	require "C:/xampp/htdocs/easyd/connect.php";

	$sql = "INSERT into clients (name, firm_name, desig, email, address, phone1, proj_associated, service, comments, entered_by, entry_time, sector)
	VALUES ('" . $name . "', '" . $firm_name . "', '" . $desig . "', '" . $email . "', '" . $address . "', '" . $phone1 . "', '" . $proj_associated . "', '" . $service . "', '" . $comments . "', '" . $username . "', '" . $time . "', '" . $sector . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>