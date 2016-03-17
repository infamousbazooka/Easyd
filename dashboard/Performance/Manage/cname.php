<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$empname = $_GET["empname"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT client_name from projectperformance WHERE client_name LIKE '%" . $term . "%' AND empname='" . $empname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["client_name"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>