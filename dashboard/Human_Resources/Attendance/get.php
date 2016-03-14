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

	$servername = "localhost";
	$uname = "root";
	$pword = "";
	$dbname = "easyd";

	$conn = new mysqli($servername, $uname, $pword, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	if ($flag == 1) {
		$sql = "SELECT * FROM leave_applications WHERE empname='" . $tname . "'";
	}
	else{
		$sql = "SELECT * FROM leave_applications";
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="table">
		<tr>
			<th>FROM</th>
			<th>TO</th>
			<th>APPLICATION DATE</th>
			<th>REASON</th>
			<th>STATUS</th>
		</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["from1"] . '</td>
		<td>' . $row["to1"] . '</td>
		<td>' . $row["application_date"] . '</td>
		<td>' . $row["reason"] . '</td>
		<td>' . $row["approval_status"] . '</td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>