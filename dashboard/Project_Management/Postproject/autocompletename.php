<?php
	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$a = array();
	$sql = "SELECT name from registration_sftwre WHERE name LIKE '%" . $term . "%'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["name"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>
