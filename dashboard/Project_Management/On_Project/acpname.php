<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$pname = $_GET["param"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT pname from project WHERE pname LIKE '%" . $term . "%' AND client_name='" . $pname . "'";
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