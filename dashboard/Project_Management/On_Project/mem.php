<?php
	$fname = $_POST["fname"];
	$pname = $_POST["pname"];
	$member = $_POST["member"];
	require "C:/xampp/htdocs/easyd/connect.php";
	$sql = "SELECT team_members FROM project WHERE client_name='" . $fname . "' AND pname='" . $pname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$temp = $row["team_members"] . ", " . $member;
	    }
	}
	$sql = "UPDATE project SET team_members='" . $temp . "' WHERE client_name='" . $fname . "' AND pname='" . $pname . "'";
	if ($conn->query($sql) === TRUE) {
		header('Location: ../../');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
	$conn->close();
?>