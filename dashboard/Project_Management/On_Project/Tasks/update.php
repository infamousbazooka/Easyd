<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
	header('Location: ../../');
}


$reply = $_POST["reply"];
$pro_name = $_POST["pname"];
$frname = $_POST["frname"];
$task = $_POST["task"];
require "C:/xampp/htdocs/easyd/connect.php";
$sql = "UPDATE proj_tasks SET reply='" . $reply . "' WHERE firmname='" . $frname . "' AND pro_name='" . $pro_name . "' AND task='" . $task . "'";
if ($conn->query($sql) === TRUE) {
	echo "REPLY SAVED";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>