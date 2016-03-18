<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = $_GET["param1"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT empid from employee_detail WHERE name LIKE '" . $term . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["empid"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>