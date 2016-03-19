<?php
	$date = $_REQUEST["date"];
	$date = strtotime($date);
	session_start();
	$username = $_SESSION["username"];
	$chk = preg_replace('/[0-9]+/', '', $username);
	$name = $_SESSION["name"];
	if ($chk == "ow") {
		$sql = "SELECT * FROM meeting_details";
	}
	else{
		$sql = "SELECT * FROM meeting_details WHERE members LIKE '%" . $name . "%'";
	}
	require "C:/xampp/htdocs/easyd/connect.php";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
	<tr class="th">
		<th>PROJECT NAME</th>
		<th>MEMBERS</th>
		<th>MEET AGENDA</th>
		<th>MEET DATE</th>
		<th>MEET TIME</th>
		<th>MEET MINUTES</th>
		<th>CONVENOR</th>
	</tr>';
	    while($row = $result->fetch_assoc()) {
	    	$da = $row["meet_date"];
	    	$da = strtotime($da);
	    	if ($date == $da) {
	    		    	echo '<tr>
	    			<td>' . $row["project_name"] . '</td>
	    			<td>' . $row["members"] . '</td>
	    			<td>' . $row["meet_agenda"] . '</td>
	    			<td>' . $row["meet_date"] . '</td>
	    			<td>' . $row["meet_time"] . '</td>
	    			<td>' . $row["meet_minutes"] . '</td>
	    			<td>' . $row["meet_convenor"] . '</td>
	    		</tr>';
	    	}
	    }
	}
	else{
		echo "ADD A NEW MEETING";
	}
	echo "</table>";
	$conn->close();
?>