<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = $_GET["param1"];
	$a = array();
	$b = array();
	$sql = "SELECT name from employee_detail WHERE empid = '" . $term . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$empname = $row["name"];
		}
	}
	$sql = "SELECT * from leave_quota WHERE empid LIKE '%" . $term . "%'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$b["empname"] = $row["empname"];
			$b["quota"] = $row["quota"];
		}
		array_push($a, $b);
	}else{
		$b["empname"] = $empname;
		$b["quota"] = 0;
		array_push($a, $b);
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>