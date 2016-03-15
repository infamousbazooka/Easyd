<?php
	switch ($_REQUEST["type"]) {
		case 'onproject':
			echo ('<div class="title"><h1>ON PROJECT</h1></div>
				<div class="links">
				<h4 onclick="getForm(\'onproject\', \'initiate\')">INITIATE PROJECT</h4>
				<h4 onclick="getForm(\'onproject\', \'clientdetails\')">CLIENT DETAILS</h4>
				<h4 onclick="getForm(\'onproject\', \'addmembers\')">ADD MEMBERS</h4>
				<h4 onclick="getForm(\'onproject\', \'viewproject\')">VIEW PROJECTS</h4>
				<h4 onclick="getForm(\'onproject\', \'tasks\')">TASKS</h4>
				</div>
				<div id="form" class="form"></div>');
			break;
		case 'openproject':
			require "C:/xampp/htdocs/easyd/connect.php";
							$sql = "SELECT * FROM project";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								echo '<table class="pure-table pure-table-bordered">
							<tr class="th">
								<th>SR. NO.</th>
								<th>PROJECT NAME</th>
								<th>CLIENT NAME</th>
								<th>TEAM LEADER</th>
								<th>TEAM MEMBERS</th>
								<th>PROJECT DESCRIPTION</th>
								<th>START DATE</th>
								<th>DEADLINE</th>
								<th>STATUS</th>
							</tr>';
							    while($row = $result->fetch_assoc()) {
							    	echo '<tr>
								<td>' . $row["pid"] . '</td>
								<td>' . $row["pname"] . '</td>
								<td>' . $row["client_name"] . '</td>
								<td>' . $row["leader"] . '</td>
								<td>' . $row["team_members"] . '</td>
								<td>' . $row["pdescription"] . '</td>
								<td>' . $row["pstartdate"] . '</td>
								<td>' . $row["penddate"] . '</td>
								<td>' . $row["report"] . '</td>
							</tr>';
							    }
							}
							else{
								echo "NO TABLES FOUND";
							}
							echo "</table>";
							$conn->close();
			break;
		case 'meetings':
			echo ('<div class="title"><h1>MEETINGS</h1></div>
				<div class="links">
				<h4 onclick="getForm(\'meetings\', \'add\')">ADD A MEETING</h4>
				<h4 onclick="getForm(\'meetings\', \'view\')">VIEW A MEETING</h4>
				</div>
				<div id="form" class="form"></div>');
			break;
		case 'companycalendar':
			echo '<div class="title"><h1>COMPANY CALENDAR</h1></div>
				<div id="form" class="form">
					<form action="d.php">
						<input class="fill" type="text" id="calendardate" required placeholder="SELECT DATE" name="calendardate">
						<article>
							<input type="submit" value="VIEW CALENDAR">
						</article>
					</form>
				</div>';
			break;
		case 'timetracker':
			echo '<div class="title"><h1>TIME TRACKER</h1></div>
				<div class="links">
				<h4 onclick="getForm(\'timetracker\', \'edit\')">EDIT TRACKING SHEET</h4>
				<h4 onclick="getForm(\'timetracker\', \'view\')">VIEW TRACKING SHEET</h4>
				</div>
				<div id="form" class="form"></div>';
			break;
		case 'reimbursements':
			echo '<div class="title"><h1>REIMBURSEMENTS</h1></div>
				<div class="links">
				<h4 onclick="getForm(\'reimbursements\', \'add\')">ADD REIMBURSEMENTS</h4>
				<h4 onclick="getForm(\'reimbursements\', \'view\')">VIEW REIMBURSEMENTS</h4>
				</div>
				<div id="form" class="form"></div>';
			break;
		case 'preproject':
			echo '<div class="title"><h1>PRE-PROJECT</h1></div>
				<div class="links">
				<h4 onclick="getForm(\'preproject\', \'new\')">NEW PROJECT</h4>
				<h4 onclick="getForm(\'preproject\', \'existing\')">EXISTING PROJECT</h4>
				</div>
				<div id="form" class="form"></div>';
			break;
		case 'postproject':
			echo '<div class="form">
				<h1>EXISTING PROJECT</h1>
				<form action="Project_Management/Postproject/get.php" method="POST">
					<input class="fill" type="text" id="firmname" required placeholder="FIRM NAME" name="firmname">
					<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="projectname">
					<article>
						<input type="button" value="GET STATUS">
					</article>
					<div class="box">
						<h4>CHECKLIST</h4>
						<label class="check">
							<h4><input type="checkbox" name="admin" id="admin"> ADMIN APPROVED</h4>
						</label>
						<label class="check">
							<h4><input type="checkbox" name="client" id="client"> CLIENT APPROVED</h4>
						</label>
						<label class="check">
							<h4><input type="checkbox" name="copies" id="copies"> HARD COPIES FILED</h4>
						</label>
						<label class="check">
							<h4><input type="checkbox" name="invoice" id="invoice"> INVOICE RAISED</h4>
						</label>
						<label class="check">
							<h4><input type="checkbox" name="pay" id="pay"> PAYMENT RECEIVED</h4>
						</label>
						<article>
							<input type="submit" value="SUBMIT">
							<input type="reset" value="CLEAR">
						</article>
					</div>
				</form>
				<script>
					$(function() {
						$(\'#empname\').autocomplete({
							source: "Project_Management/Postproject/autocompletename.php",
							minLength: 2
						});
					});
				</script>
			</div>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>