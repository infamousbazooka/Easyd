<?php
	require "C:/xampp/htdocs/easyd/connect.php";
	$fname = $_REQUEST["fname"];
	$pname = $_REQUEST["pname"];
	$sql = "SELECT * FROM project WHERE client_name='" . $fname . "' AND pname='" . $pname . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
	<tr>
		<th>TEAM MEMBERS</th>
	</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["team_members"] . '</td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>