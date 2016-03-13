<?php
	switch ($_REQUEST["type"]) {
		case 'initiate':
			echo '<h1>PROJECT DETAILS</h1>
				<form action="leaveapplication.php">
					<article>
						<input class="fill" type="text" id="firmname" required placeholder="FIRM NAME" name="firmname">
						<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="projectname">
					</article>
					<article>
						<input class="fill" type="text" id="leader" required placeholder="TEAM LEADER" name="leader">
						<input class="fill" type="text" id="members" required placeholder="MEMBERS" name="projectname">
					</article>
					<textarea class="fill" name="description" required placeholder="PROJECT DESCRIPTION"></textarea>
					<article>
						<input class="fill" type="text" id="start" required placeholder="START DATE" name="start">
						<input class="fill" type="text" id="end" required placeholder="END DATE" name="end">
					</article>
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		
		case 'clientdetails':
			echo '<h1>CLIENT DETAILS</h1>
				<form action="leaveapplication.php">
					<input class="fill" type="text" id="name" required placeholder="CLIENT NAME" name="name">
					<input class="fill" type="text" id="designation" required placeholder="DESIGNATION" name="designation">
					<input class="fill" type="tel" id="contact" required placeholder="CONTACT" name="contact">
					<input class="fill" type="email" id="email" required placeholder="EMAIL" name="email">
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