<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$cname = $_GET["val"];
	$pname = $_GET["param"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT pname, leader, pdescription, pstartdate, penddate from project WHERE pname='" . $pname . "' AND client_name='" . $cname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$b["pname"] = $row["pname"];
			$b["leader"] = $row["leader"];
			$b["pdescription"] = $row["pdescription"];
			$b["pstartdate"] = $row["pstartdate"];
			$b["penddate"] = $row["penddate"];
		}
		array_push($a, $b);
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>