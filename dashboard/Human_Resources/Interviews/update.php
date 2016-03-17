<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}


$name = $_POST["name"];
$status = $_POST["status"];


	require "C:/xampp/htdocs/easyd/connect.php";

$sql = "UPDATE interview SET status='" . $status . "' WHERE name='" . $name . "'";

if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>