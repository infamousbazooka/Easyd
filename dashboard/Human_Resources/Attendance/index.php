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
		default:
			echo "nothin";
			break;
	}
	
?>