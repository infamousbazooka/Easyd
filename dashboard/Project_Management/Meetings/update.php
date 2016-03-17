<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}


$pname = $_REQUEST["pname"];
$to = $_REQUEST["to"];
$minutes = $_REQUEST["minutes"];
require "C:/xampp/htdocs/easyd/connect.php";

$sql = "UPDATE meeting_details SET meet_minutes='" . $minutes . "' WHERE empid='" . $id . "' AND meet_date='" . $to . "'";

$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
		header('Location: ../../');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}
$conn->close();
?>