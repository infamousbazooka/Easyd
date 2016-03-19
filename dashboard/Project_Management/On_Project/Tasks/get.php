<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$param2 = $_GET["param2"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT address from clients WHERE firm_name='" . $param2 . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["address"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>