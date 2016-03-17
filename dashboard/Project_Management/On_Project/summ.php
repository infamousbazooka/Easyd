<?php
	require "C:/xampp/htdocs/easyd/connect.php";
	$sql = "SELECT * FROM project";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
	<tr>
		<th>PROJECT NAME</th>
		<th>FIRM NAME</th>
		<th>LEADER</th>
		<th>MEMBERS</th>
		<th>DESCRIPTION</th>
		<th>START DATE</th>
		<th>END DATE</th>
	</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["pname"] . '</td>
		<td>' . $row["client_name"] . '</td>
		<td>' . $row["leader"] . '</td>
		<td>' . $row["team_members"] . '</td>
		<td>' . $row["pdescription"] . '</td>
		<td>' . $row["pstartdate"] . '</td>
		<td>' . $row["penddate"] . '</td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>