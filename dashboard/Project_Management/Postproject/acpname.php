<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$fname = $_GET["param"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT pro_name from postproject WHERE pro_name LIKE '%" . $term . "%' AND firmname='" . $fname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["pro_name"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>