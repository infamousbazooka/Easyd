<?php
	session_start();
	$username = $_SESSION["name"];
	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$date1 = $_POST["date"];
	$client_name = $_POST["cname"];
	$project_name = $_POST["pname"];
	$work_accomplished = $_POST["workacc"];
	$num_hours = $_POST["hours"];
	$marketing = $_POST["marketing"];
	$mark_work_accom = $_POST["wacc"];
	$admin = $_POST["admin"];
	$admin_work_accom = $_POST["awacc"];
	$ope = $_POST["ope"];

	
	require "C:/xampp/htdocs/easyd/connect.php";
	$today = date('Y-m-d H:i:s');

	$sql = "INSERT into time_tracker (empname, date1, client_name, project_name, work_accomplished, num_hours, marketing, mark_work_accom, admin, admin_work_accom, ope, submit_time)
	VALUES ('" . $username . "', '" . $date1 . "', '" . $client_name . "', '" . $project_name . "', '" . $work_accomplished . "', '" . $num_hours . "', '" . $marketing . "', '" . $mark_work_accom . "', '" . $admin . "', '" . $admin_work_accom . "', '" . $ope . "', '" . $today . "')";

	if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>