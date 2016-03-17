<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}


$name = $_POST["name"];
$cpass = $_POST["cpass"];
$pass = $_POST["pass"];

	require "C:/xampp/htdocs/easyd/connect.php";

$sql = "UPDATE registration_sftwre SET password='" . $pass . "' WHERE name='" . $name . "' AND password='" . $cpass . "'";

if ($conn->query($sql) === TRUE) {
	header('Location: ../../');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>