<?php
	session_start();
	$username = $_SESSION["username"];
	$chk = preg_replace('/[0-9]+/', '', $username);
	$name = $_SESSION["name"];
	if ($chk=="ow") {
		$sql = "SELECT pname, client_name, leader, report FROM project";
	}
	else{
		$sql = "SELECT pname, client_name, leader, report FROM project WHERE leader='" . $name . "' OR team_members LIKE '%" . $name . "%'";
	}
	require "C:/xampp/htdocs/easyd/connect.php";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
	<tr class="th">
		<th>PROJECT NAME</th>
		<th>CLIENT NAME</th>
		<th>LEADER</th>
		<th>REPORT</th>
	</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["pname"] . '</td>
		<td>' . $row["client_name"] . '</td>
		<td>' . $row["leader"] . '</td>
		<td><a href="' . $row["report"] . '">' . $row["report"] . '</a></td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>