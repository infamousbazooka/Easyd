<?php
	switch ($_REQUEST["type"]) {
		case 'onproject':
			echo ('<div class="title"><h1>ON PROJECT</h1></div>
				<div class="links">
				<h4 onclick="getForm(\'onproject\', \'initiate\')">INITIATE PROJECT</h4>
				<h4 onclick="getForm(\'onproject\', \'clientdetails\')">CLIENT DETAILS</h4>
				<h4>ADD MEMBERS</h4>
				<h4>VIEW PROJECTS</h4>
				<h4>TASKS</h4>
				</div>
				<div id="form" class="form"></div>');
			break;
		default:
			echo "nothin";
			break;
	}
	
?>