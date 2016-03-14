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
						<input type="button" value="UPDATE">
					</article>
				</form>';
			break;
		case 'view':
			echo '';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>