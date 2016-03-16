<?php
	if (isset($_REQUEST["name"])) {
		$tname = $_REQUEST["name"];
		$tmonth = $_REQUEST["month"];
		$tyear = $_REQUEST["year"];
		$flag = 1;
	}
	else{
		$tmonth = $_REQUEST["month"];
		$tyear = $_REQUEST["year"];
		$flag = 0;
	}

	require "C:/xampp/htdocs/easyd/connect.php";
	if ($flag == 1) {
		$sql = "SELECT * FROM attd_summary WHERE empname='" . $tname . "'";
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
	    	$datef = strtotime($row["date1"]);
	    	if ($tmonth.$tyear == date('M',$datef).date('Y',$datef)) {
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