<?php
$servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "easyd";
$conn = new mysqli($servername, $uname, $pword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>