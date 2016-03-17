<?php
	switch ($_REQUEST["type"]) {
		case 'sreg':
			session_start();
			$username = $_SESSION["username"];
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM salary_register WHERE empid='" . $username . "'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
			<tr>
				<th>AMOUNT</th>
				<th>DATE</th>
				<th>PAY TYPE</th>
			</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["amount"] . '</td>
				<td>' . $row["date1"] . '</td>
				<td>' . $row["pay_type"] . '</td>
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