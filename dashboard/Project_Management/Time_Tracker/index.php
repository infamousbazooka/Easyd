<?php
	switch ($_REQUEST["type"]) {
		case 'edit':
			echo '<h1>NEW REGISTRATION</h1>
				<form action="Project_Management/Time_Tracker/edit.php" method="POST">
					<section>
						<input class="fill" type="text" id="date" required placeholder="DATE" name="date">
						<input class="fill" type="text" id="cname" required placeholder="CLIENT NAME" name="cname">
					</section>
					<section>
						<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
						<input class="fill" type="text" id="workacc" required placeholder="WORK ACCOMPLISHED" name="workacc">
					</section>
					<section>
						<input class="fill" type="number" id="hours" required placeholder="NO OF HOURS" name="hours">
						<input class="fill" type="text" id="marketing" required placeholder="MARKETING" name="marketing">
					</section>
					<section>
						<input class="fill" type="text" id="mwacc" required placeholder="MARKETING WORK ACCOMPLISHED" name="wacc">
						<input class="fill" type="text" id="admin" required placeholder="ADMIN" name="admin">
					</section>
					<section>
						<input class="fill" type="text" id="awacc" required placeholder="ADMIN WORK ACCOMPLISHED" name="awacc">
						<input class="fill" type="text" id="ope" required placeholder="OPE" name="ope">
					</section>
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		case 'view':
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM time_tracker";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
					<tr class="th">
						<th>ID</th>
						<th>EMPNAME</th>
						<th>DATE</th>
						<th>CLIENT NAME</th>
						<th>PROJECT NAME</th>
						<th>WORK ACCOMPLISHED</th>
						<th>NO OF HOURS</th>
						<th>MARKETING</th>
						<th>ADMIN</th>
						<th>OPE</th>
						<th>SUBMIT TIME</th>
						<th>REMARKS</th>
					</tr>';
			    while($row = $result->fetch_assoc()) {
					echo '<tr>
						<td>' . $row["id"] . '</td>
						<td>' . $row["empname"] . '</td>
						<td>' . $row["date1"] . '</td>
						<td>' . $row["client_name"] . '</td>
						<td>' . $row["project_name"] . '</td>
						<td>' . $row["work_accomplished"] . '</td>
						<td>' . $row["num_hours"] . '</td>
						<td>' . $row["marketing"] . '</td>
						<td>' . $row["admin"] . '</td>
						<td>' . $row["ope"] . '</td>
						<td>' . $row["submit_time"] . '</td>
						<td>' . $row["remarks"] . '</td>
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