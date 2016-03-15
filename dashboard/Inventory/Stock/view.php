<?php
	require "C:/xampp/htdocs/easyd/connect.php";
	if (isset($_REQUEST["category"])) {
		$category = $_REQUEST["category"];
		$leadtype = $_REQUEST["type"];
		$itemname = $_REQUEST["name"];
		$sql = "SELECT * FROM stock_details WHERE category='" . $category . "' AND item='" . $itemname . "'";
	}
	else{
		$sql = "SELECT * FROM stock_details";
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table class="table pure-table">
	<tr>
		<th>ITEM</th>
		<th>DESCRIPTION</th>
		<th>CATEGORY</th>
		<th>QUANTITY</th>
		<th>PRICE</th>
		<th>PURCHASE DATE</th>
		<th>BUFFER</th>
	</tr>';
	    while($row = $result->fetch_assoc()) {
	    	echo '<tr>
		<td>' . $row["item"] . '</td>
		<td>' . $row["description"] . '</td>
		<td>' . $row["category"] . '</td>
		<td>' . $row["quantity"] . '</td>
		<td>' . $row["price"] . '</td>
		<td>' . $row["purchase_date"] . '</td>
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