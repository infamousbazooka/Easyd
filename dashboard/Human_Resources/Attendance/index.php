<?php
	switch ($_REQUEST["type"]) {
		case 'leave':
			echo '<h1>LEAVE APPLICATION</h1>
						<form action="leaveapplication.php">
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
				<form action="leaveapplication.php">
					<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="empid">
					<input class="fill" type="text" id="empname" required placeholder="EMPLOYEE NAME" name="empname">
					<input class="fill" type="text" id="empname" required placeholder="EXISTING LEAVES" name="empname">
					<input class="fill" type="text" id="empname" required placeholder="NEW LEAVES" name="empname">
					<input class="fill" type="text" id="empname" required placeholder="TOTAL LEAVES" name="empname">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>