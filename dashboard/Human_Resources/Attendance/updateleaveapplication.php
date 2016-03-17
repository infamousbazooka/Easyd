<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}


$id = $_POST["id"];
$quota = $_POST["quota"];
$qwe = $_POST["empname"];
require "C:/xampp/htdocs/easyd/connect.php";

$sql = "SELECT * from leave_quota WHERE empid = '" . $id . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$empname = $row["empname"];
	}
	$sql = "UPDATE leave_quota SET quota='" . $quota . "' WHERE empid='" . $id . "'";
	if ($conn->query($sql) === TRUE) {
		header('Location: ../../');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}else{
	$sql = "INSERT into leave_quota (empid, quota, year1, empname)
	VALUES ('" . $id . "', '" . $quota . "', '" . date('Y-m-d') . "', '" . $qwe . "')";

	if ($conn->query($sql) === TRUE) {
		header('Location: ../../');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
?>