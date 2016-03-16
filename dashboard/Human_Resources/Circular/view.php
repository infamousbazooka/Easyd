<?php
	echo ('<div class="form">
		<h1>CIRCULAR</h1>
	</div>');
	require "C:/xampp/htdocs/easyd/connect.php";
	$sql = "SELECT empid, name, cv_path FROM employee_detail";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
		<tr>
			<th>EMPID</th>
			<th>NAME</th>
			<th>CV PATH</th>
		</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["empid"] . '</td>
		<td>' . $row["name"] . '</td>
		<td><a href="' . $row["cv_path"] . '">' . $row["cv_path"] . '</a></td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>