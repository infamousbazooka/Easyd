<?php
	switch ($_REQUEST["type"]) {
		case 'leave':
			echo '<h1>LEAVE APPLICATION</h1>
						<form action="Human_Resources/Attendance/leaveapplication.php" method="POST">
							<input class="fill" type="text" id="from" required placeholder="FROM" name="from">
							<input class="fill" type="text" id="to" required placeholder="TO" name="to">
							<textarea class="fill" name="reason" required placeholder="REASON FOR LEAVE"></textarea>
							<article>
								<input type="submit" value="SUBMIT">
								<input type="reset" value="RESET">
							</article>
						</form>';
			break;
		case 'update':
			echo '<h1>UPDATE LEAVE QUOTA</h1>
				<form action="updateleaveapplication.php">
					<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="empid">
					<input class="fill" type="text" id="empname" class = "ui-autocomplete input" autocomplete="off" required placeholder="EMPLOYEE NAME" name="empname">
					<input class="fill" type="text" id="eleaves" required placeholder="EXISTING LEAVES" name="eleaves">
					<input class="fill" type="text" id="nleaves" required placeholder="NEW LEAVES" name="nleaves">
					<input class="fill" type="text" id="tleaves" required placeholder="TOTAL LEAVES" name="tleaves">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
					<script>
						$(function() {
							$(\'#empname\').autocomplete({
								source: "Human_Resources/Attendance/autocompletename.php",
								minLength: 2
							});
						});
					</script>
				</form>';
			break;
		case 'lreg':
			
				$servername = "localhost";
				$uname = "root";
				$pword = "";
				$dbname = "easyd";

				$conn = new mysqli($servername, $uname, $pword, $dbname);
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}
				session_start();
				$username = $_SESSION["username"];
				$name = $_SESSION["name"];
				$sql = "SELECT from1, to1, application_date, reason, approval_status FROM leave_applications WHERE empname='" . $name . "'";
				$result = $conn->query($sql);
				echo "<h1>LEAVE REGISTER</h1>
			<table class='table'>
				<tr>
					<th>FROM</th>
					<th>TO</th>
					<th>APPLICATION DATE</th>
					<th>REASON</th>
					<th>STATUS</th>
				</tr>";
				if ($result->num_rows > 0) {
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
				echo "</table>";
				$sql = "SELECT quota FROM leave_quota WHERE empname='" . $name . "' AND empid='" . $username . "'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				    	echo "<h3 class='quota'>You have " . $row["quota"] . " days in your leave quota.<h3>";
				    }
				}
				$conn->close();
			break;
		case 'attreg':
			echo'';
			break;
		case 'gatt':
			echo'';
			break;
		case 'leaveapp':
			echo'';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>