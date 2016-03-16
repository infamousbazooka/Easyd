<?php
	switch ($_REQUEST["type"]) {
		case 'view':
			echo ('<div class="title"><h1>PERFORMANCE MANAGEMENT</h1></div>
					<div class="links">
						<h4 onclick="getForm(\'perf\', \'atten\')">ATTENDANCE</h4>
						<h4 onclick="getForm(\'perf\', \'proj\')">PROJECT</h4>
					</div>
					<div id="form" class="form"></div>');
			break;
		default:
			echo "nothin";
			break;
	}
	
?>