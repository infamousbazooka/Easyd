<?php
	switch ($_REQUEST["type"]) {
		case 'attendance':
			echo ('<div class="title"><h1>ATTENDANCE</h1></div>
<div class="links">
	<h4 onclick="getForm(\'attendance\', \'leave\')">APPLY FOR LEAVE</h4>
	<h4>LEAVE REGISTER</h4>
	<h4>COMPANY ATTENDANCE REGISTER</h4>
	<h4>GIVE ATTENDANCE</h4>
	<h4>LEAVE APPLICATIONS</h4>
	<h4 onclick="getForm(\'attendance\', \'update\')">UPDATE LEAVE QUOTA</h4>
</div>
<div id="form" class="form"></div>');
			break;
		default:
			echo "nothin";
			break;
	}
	
?>