<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$pro_name = $_POST["pname"];
	$feedback = $_POST["feedback"];
	$owner = $_POST["owner"];
	$formating = $_POST["formating"];
	$enthusiasm = $_POST["enthusiasm"];
	$detail = $_POST["detail"];
	$submitted_by = $_POST["empname"];
	$client_remarks = $_POST["client_remarks"];
	$firmname = $_POST["fname"];
	$adminremark = $_POST["adminremark"];

	$servername = "localhost";
	$uname = "root";
	$pword = "";
	$dbname = "easyd";

	$conn = new mysqli($servername, $uname, $pword, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	date_default_timezone_set('Asia/Calcutta');
	$today = $date = date('d-m-Y');

	$sql = "INSERT into appraisal (emp_name, pro_name, feedback, owner, formating, enthusiasm, detail, submitted_by, time1, client_remarks, firmname, adminremark)
	VALUES ('" . $username . "', '" . $pro_name . "', '" . $feedback . "', '" . $owner . "', '" . $formating . "', '" . $enthusiasm . "', '" . $detail . "', '" . $submitted_by . "', '" . $today . "', '" . $client_remarks . "', '" . $firmname . "', '" . $adminremark . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>