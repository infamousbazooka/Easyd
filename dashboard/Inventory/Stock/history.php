<?php
	require "C:/xampp/htdocs/easyd/connect.php";
	if (isset($_REQUEST["category"])) {
		$category = $_REQUEST["category"];
		$leadtype = $_REQUEST["type"];
		$itemname = $_REQUEST["name"];
		$sql = "SELECT * FROM stock_consumed WHERE category='" . $category . "' AND item='" . $itemname . "'";
	}
	else{
		$sql = "SELECT * FROM stock_consumed";
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="pure-table pure-table-bordered">
	<tr>
		<th>ITEM</th>
		<th>QUANTITY</th>
		<th>TIME</th>
		<th>CATEGORY</th>
		<th>BUFFER</th>
	</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["item"] . '</td>
		<td>' . $row["quantity"] . '</td>
		<td>' . $row["time1"] . '</td>
		<td>' . $row["category"] . '</td>
		<td>' . $row["buffer"] . '</td>
	</tr>';
	    }
	}
	else{
		echo "NO TABLES FOUND";
	}
	echo "</table>";
	$conn->close();
?>