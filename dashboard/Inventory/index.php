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
			echo ('<div class="form">
				<h1>ITEMS TO BE PURCHASED</h1>
			</div>');
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM item_purchase";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
				<tr>
					<th>ITEM</th>
					<th>CATEGORY</th>
					<th>STOCK</th>
					<th>TIME</th>
				</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["item"] . '</td>
				<td>' . $row["category"] . '</td>
				<td>' . $row["current_stock"] . '</td>
				<td>' . $row["time1"] . '</td>
			</tr>';
			    }
			}
			else{
				echo "NO TABLES FOUND";
			}
			echo "</table>";
			$conn->close();
			break;
		default:
			echo "nothin";
			break;
	}
	
?>