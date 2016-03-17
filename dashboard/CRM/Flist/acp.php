<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$term = trim(strip_tags($_GET["term"]));
	$fname = $_GET["fname"];
	$prname = $_GET["prname"];
	$a = array();
	$b = array();
	$sql = "SELECT * FROM `follow_list` WHERE proj_associated LIKE '%" . $term . "%' AND prospect_name='" . $prname . "' AND firm_name='" . $fname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["proj_associated"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>