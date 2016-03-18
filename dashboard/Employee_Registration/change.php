<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}


$empid = $_POST["empid"];
$cpass = $_POST["cpass"];
$pass = $_POST["pass"];

require "C:/xampp/htdocs/easyd/connect.php";

$sql = "UPDATE registration_sftwre SET password='" . $pass . "' WHERE empid='" . $empid . "' AND password='" . $cpass . "'";

if ($conn->query($sql) === TRUE) {
	echo "PASSWORD CHANGED";
} else {
    echo "PLEASE CHECK YOUR CURRENT PASSWORD";
}

$conn->close();
?>