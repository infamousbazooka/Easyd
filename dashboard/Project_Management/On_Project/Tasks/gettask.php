<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$cname = $_GET["param"];
	$pname = $_GET["val"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT task from proj_tasks WHERE pro_name='" . $pname . "' AND firmname='" . $cname . "' LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($a, $row["task"]);
		}
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>