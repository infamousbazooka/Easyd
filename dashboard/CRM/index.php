<?php
	switch ($_REQUEST["type"]) {
		case 'client':
			echo ('<div class="title"><h1>CLIENT LIST</h1></div>
						<div class="links">
							<h4 onclick="getForm(\'clist\', \'viewclient\')">VIEW CLIENTS</h4>
							<h4 onclick="getForm(\'clist\', \'newclient\')">ADD NEW CLIENT</h4>
						</div>
					<div id="form" class="form"></div>');
			break;

		case 'followup':
			echo ('<div class="title"><h1>FOLLOWUP LIST</h1></div>
						<div class="links">
							<h4 onclick="getForm(\'flist\', \'nlead\')">NEW LEAD</h4>
							<h4 onclick="getForm(\'flist\', \'elead\')">EXISTING LEAD</h4>
						</div>
					<div id="form" class="form"></div>');
			break;
		default:
			echo "nothin";
			break;
	}
	
?>