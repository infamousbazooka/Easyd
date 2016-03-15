<?php
	if (isset($_REQUEST["name"])) {
		$tname = $_REQUEST["name"];
		$flag = 1;
	}
	else{
		$flag = 0;
	}

	require "C:/xampp/htdocs/easyd/connect.php";
	if ($flag == 1) {
		$sql = "SELECT * FROM employee_detail WHERE name='" . $tname . "'";
	}
	else{
		$sql = "SELECT * FROM employee_detail";
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="table">
	<tr>
		<th>EMPID</th>
		<th>NAME</th>
		<th>EMAIL</th>
		<th>CATEGORY</th>
		<th>CV</th>
		<th>DOCUMENTS</th>
		<th>ADDRESS</th>
		<th>JOIN DATE</th>
		<th>CONTACT</th>
		<th>DOB</th>
		<th>BANK</th>
	</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["empid"] . '</td>
		<td>' . $row["name"] . '</td>
		<td>' . $row["email_id"] . '</td>
		<td>' . $row["category"] . '</td>
		<td>' . $row["cv_path"] . '</td>
		<td>' . $row["docs"] . '</td>
		<td>' . $row["address"] . '</td>
		<td>' . $row["join_date"] . '</td>
		<td>' . $row["contact"] . '</td>
		<td>' . $row["dob"] . '</td>
		<td>' . $row["bank"] . '</td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>