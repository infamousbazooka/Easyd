<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$category = $_GET["category"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT * from stock_consumed WHERE item LIKE '%" . $term . "%' AND category='" . $category . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["item"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>