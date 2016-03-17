<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$empname = $_GET["empname"];
	$clientname = $_GET["clientname"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT pname from projectperformance WHERE pname LIKE '%" . $term . "%' AND empname='" . $empname . "' AND client_name='" . $clientname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["pname"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>