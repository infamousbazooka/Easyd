<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$cname = $_GET["val"];
	$pname = $_GET["param"];
	$a = array();
	$b = array();
	$sql = "SELECT DISTINCT admin, client, hard, invoice, payment from postproject WHERE firmname='" . $cname . "' AND pro_name='" . $pname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$b["admin"] = $row["admin"];
			$b["client"] = $row["client"];
			$b["hard"] = $row["hard"];
			$b["invoice"] = $row["invoice"];
			$b["payment"] = $row["payment"];
		}
		array_push($a, $b);
	}
	echo json_encode($a);
	flush();
	$conn->close();
?>