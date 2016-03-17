<?php
  	require "C:/xampp/htdocs/easyd/connect.php";
	$fname = $_REQUEST["fname"];
	$prname = $_REQUEST["prname"];
	$pname = $_REQUEST["pname"];

	$sql = "SELECT entered_by, entry_time, follow_reason, follow_reply FROM follow_list WHERE prospect_name='" . $prname . "' AND firm_name='" . $fname . "' AND proj_associated='" . $pname . "'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
		<tr>
			<th>ENTERED BY</th>
			<th>ENTRY TIME</th>
			<th>FOLLOW REASON</th>
			<th>FOLLOW REPLY</th>
		</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
				<td>' . $row["entered_by"] . '</td>
				<td>' . $row["entry_time"] . '</td>
				<td>' . $row["follow_reason"] . '</td>
				<td>' . $row["follow_reply"] . '</td>
			</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>