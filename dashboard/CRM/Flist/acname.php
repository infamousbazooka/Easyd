<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT firm_name from follow_list WHERE firm_name LIKE '%" . $term . "%'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["firm_name"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>