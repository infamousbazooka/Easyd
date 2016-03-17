<?php
	switch ($_REQUEST["type"]) {
		case 'add':
			echo '<h1>ADD MEETING</h1>
				<form action="Project_Management/Meetings/insert.php" method="POST">
					<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
					<input class="fill" type="text" id="memreq" required placeholder="MEMBERS REQUIRED" name="memreq">
					<input class="fill" type="text" id="agenda" required placeholder="AGENDA" name="agenda">
					<input class="fill" type="text" id="to" required placeholder="DATE" name="mdate">
					<input class="fill" type="time" id="time" required placeholder="TIME" name="time">
					<input class="fill" type="text" id="minutes" required placeholder="MINUTES OF THE MEETING" name="minutes">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
						<input type="button" id="update" value="UPDATE">
					</article>
				</form>
				<script>
					$(function() {
						$(\'#pname\').autocomplete({
							source: "Project_Management/Meetings/acpname.php"
						});
					});
					function updatemeet() {
						file = "http://localhost/easyd/dashboard/Project_Management/Meetings/update.php";
						pname = $("#pname").val();
						date = $("#to").val();
						$("#xot").load(file, {"pname":pname, "to": to});
					}
				</script>
				<h4 id="xot"></h4>';
			break;
		case 'view':
				require "C:/xampp/htdocs/easyd/connect.php";
				$sql = "SELECT * FROM meeting_details";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<table class="pure-table pure-table-bordered">
				<tr class="th">
					<th>PROJECT NAME</th>
					<th>MEMBERS REQUIRED</th>
					<th>MEETING AGENDA</th>
					<th>DATE</th>
					<th>TIME</th>
					<th>MEETING MINUTES</th>
					<th>ORGANISED BY</th>
					<th>RECORDED AT</th>
				</tr>';
				    while($row = $result->fetch_assoc()) {
				    	echo '<tr>
					<td>' . $row["project_name"] . '</td>
					<td>' . $row["members"] . '</td>
					<td>' . $row["meet_agenda"] . '</td>
					<td>' . $row["meet_date"] . '</td>
					<td>' . $row["meet_time"] . '</td>
					<td>' . $row["meet_minutes"] . '</td>
					<td>' . $row["meet_convenor"] . '</td>
					<td>' . $row["meet_addtime"] . '</td>
				</tr>';
				    }
				}
				else{
					echo "NO TABLES FOUND";
				}
				echo "</table>";
				$conn->close();
			break;
		default:
			echo "nothin";
			break;
	}
	
?>