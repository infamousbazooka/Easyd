<?php
	if (isset($_REQUEST["name"])) {
		$tempname = $_REQUEST["name"];
		$month = $_REQUEST["month"];
		$year = $_REQUEST["year"];
		$flag = 1;
	}
	else{
		$month = $_REQUEST["month"];
		$year = $_REQUEST["year"];
		$flag = 0;
	}

	require "C:/xampp/htdocs/easyd/connect.php";
	if ($flag == 1) {
		$sql = "SELECT * FROM attd_summary WHERE empname='" . $tempname . "'";
	}
	else{
		$sql = "SELECT * FROM attd_summary";
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

		echo '<table class="pure-table pure-table-bordered">
		<tr>
			<th>EMPLOYEE NAME</th>
			<th>IN TIME</th>
			<th>OUT TIME</th>
			<th>DATE</th>
		</tr>';
	    while($row = $result->fetch_assoc()) {
	    	$chk = $row["date1"];
	    	$chk = strtotime($chk);
	    	if (date('Y', $chk) == $year && date('M', $chk)==$month) {
	    		echo '<tr>
				<td>' . $row["empname"] . '</td>
				<td>' . $row["intime"] . '</td>
				<td>' . $row["outtime"] . '</td>
				<td>' . $row["date1"] . '</td>
			</tr>';
	    	}
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>