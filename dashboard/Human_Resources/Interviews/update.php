<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}


$name = $_POST["name"];
$status = $_POST["status"];

$servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "easyd";

$conn = new mysqli($servername, $uname, $pword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE interview SET status='" . $status . "' WHERE name='" . $name . "'";

if ($conn->query($sql) === TRUE) {
	    header('Location: ../../');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>