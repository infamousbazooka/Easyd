<?php
	require "C:/xampp/htdocs/easyd/connect.php";
	if (isset($_REQUEST["sector"])) {
		$sector = $_REQUEST["sector"];
		$sql = "SELECT * FROM clients WHERE sector='" . $sector . "'";
	} else{
		$sql = "SELECT * FROM clients";
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
		<tr>
			<th>NAME</th>
			<th>FIRM NAME</th>
			<th>DESIGNATION</th>
			<th>EMAIL</th>
			<th>ADDRESS</th>
			<th>PHONE</th>
			<th>PROJECT ASSOCIATED</th>
			<th>SERVICE</th>
			<th>COMMENTS</th>
			<th>ENTERED BY</th>
			<th>ENTRY TIME</th>
			<th>SECTOR</th>
		</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["name"] . '</td>
		<td>' . $row["firm_name"] . '</td>
		<td>' . $row["desig"] . '</td>
		<td>' . $row["email"] . '</td>
		<td>' . $row["address"] . '</td>
		<td>' . $row["phone1"] . '</td>
		<td>' . $row["proj_associated"] . '</td>
		<td>' . $row["service"] . '</td>
		<td>' . $row["comments"] . '</td>
		<td>' . $row["entered_by"] . '</td>
		<td>' . $row["entry_time"] . '</td>
		<td>' . $row["sector"] . '</td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>