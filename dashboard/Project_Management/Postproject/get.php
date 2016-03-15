<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$firmname = $_POST["firmname"];
	$projectname = $_POST["projectname"];

	$admin = $client = $copies = $invoice = $pay = 'No';
	if (isset($_POST["admin"])) {
		$admin = 'Yes';
	}
	if (isset($_POST["client"])) {
		$client = 'Yes';
	}
	if (isset($_POST["copies"])) {
		$copies = 'Yes';
	}
	if (isset($_POST["invoice"])) {
		$invoice = 'Yes';
	}
	if (isset($_POST["pay"])) {
		$pay = 'Yes';
	}

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d H:i:s');

	$sql = "INSERT into postproject (firmname, pro_name, admin, client, hard, invoice, payment)
	VALUES ('" . $firmname . "', '" . $projectname . "', '" . $admin . "', '" . $client . "', '" . $copies . "', '" . $invoice . "', '" . $pay . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>