<?php
	switch ($_REQUEST["type"]) {
		case 'stock':
			echo '<div class="title"><h1>STOCK DETAILS</h1></div>
				<div class="links">
				<h4 onclick="getForm(\'stock\', \'add\')">ADD STOCKS</h4>
				<h4 onclick="getForm(\'stock\', \'view\')">VIEW PURCHASE HISTORY</h4>
				<h4 onclick="getForm(\'stock\', \'update\')">UPDATE STOCKS</h4>
				<h4 onclick="getForm(\'stock\', \'history\')">VIEW CONSUMPTION HISTORY</h4>
				</div>
				<div id="form" class="form"></div>';
			break;
		case 'items':
			break;
		default:
			echo "nothin";
			break;
	}
	
?>