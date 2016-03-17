<?php
	session_start();

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$name = $_POST["name"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$contact = $_POST["contact"];
	$intby = $_POST["interby"];
	$status = $_POST["status"];
	if ($status == "") {
		$status = 'Pending';
	}
	$post = $_POST["posttype"];
	$inton = $_POST["interdate"];
	$dob = $_POST["dob"];
	$remark = $_POST["remarks"];

	
	require "C:/xampp/htdocs/easyd/connect.php";

	$sql = "INSERT into interview (name, email, address, contact, interviewed_by, post, interview_date, dob, remarks, status)
	VALUES ('" . $name . "', '" . $email . "', '" . $address . "', '" . $contact . "', '" . $intby . "', '" . $post . "', '" . $inton . "', '" . $dob . "', '" . $remarks . "', '" . $status . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>