<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$fname = $_GET["fname"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT prospect_name from follow_list WHERE prospect_name LIKE '%" . $term . "%' AND firm_name='" . $fname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["prospect_name"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>