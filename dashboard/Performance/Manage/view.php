<?php
	if (isset($_REQUEST["empname"])) {
		$tempname = $_REQUEST["empname"];
		$tclientname = $_REQUEST["clientname"];
		$tprojname = $_REQUEST["projname"];
		$flag = 1;
	}
	else{
		$flag = 0;
	}

	require "C:/xampp/htdocs/easyd/connect.php";
	if ($flag == 1) {
		$sql = "SELECT * FROM projectperformance WHERE empname='" . $tempname . "' AND client_name='" . $tclientname . "' AND pname='" . $tprojname . "'";
	}
	else{
		$sql = "SELECT * FROM projectperformance";
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
		<tr>
			<th>EMPLOYEE NAME</th>
			<th>PROJECT NAME</th>
			<th>CLIENT NAME</th>
			<th>HOURS</th>
			<th>SALARY</th>
		</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
				<td>' . $row["empname"] . '</td>
				<td>' . $row["pname"] . '</td>
				<td>' . $row["client_name"] . '</td>
				<td>' . $row["num_hr"] . '</td>
				<td>' . $row["salary"] . '</td>
			</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>