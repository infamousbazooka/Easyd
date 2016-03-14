<?php
  	$servername = "localhost";
  	$uname = "root";
  	$pword = "";
  	$dbname = "easyd";

  	$conn = new mysqli($servername, $uname, $pword, $dbname);

  	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$term = trim(strip_tags($_GET["term"]));
	$a = array();
	$b = array();
	$sql = "SELECT name from interview WHERE name LIKE '%" . $term . "%'";
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