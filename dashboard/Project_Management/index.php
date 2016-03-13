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
			echo '<div class="title"><h1>OPEN PROJECT</h1></div>
				<div id="form" class="form">
					<form action="d.php">
						<article>
							<input type="button" value="VIEW PROJECTS">
						</article>
					</form>
				</div>';
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
		default:
			echo "nothin";
			break;
	}
	
?>