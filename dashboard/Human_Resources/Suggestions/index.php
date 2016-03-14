<?php
	switch ($_REQUEST["type"]) {
		case 'view':
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM complaints";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="table">
			<tr>
				<th>EMPID</th>
				<th>EMPNAME</th>
				<th>COMPLAINT</th>
				<th>TIME</th>
				<th>REMARKS</th>
				<th>REPLIED BY</th>
			</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["empid"] . '</td>
				<td>' . $row["empname"] . '</td>
				<td>' . $row["complaint"] . '</td>
				<td>' . $row["time1"] . '</td>
				<td>' . $row["remarks"] . '</td>
				<td>' . $row["replied_by"] . '</td>
			</tr>';
			    }
			}
			else{
				echo "NO TABLES FOUND";
			}
			echo "</table>";
			$conn->close();
			break;
		case 'give':
			echo '<h1>GIVE SUGGESTIONS</h1>
				<form action="Human_Resources/Suggestions/suggest.php" method="POST">
					<textarea class="fill" name="compl" id="suggestion" required placeholder="SUGGESTION"></textarea>
					<article>
						<input type="submit" value="SUGGEST">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>