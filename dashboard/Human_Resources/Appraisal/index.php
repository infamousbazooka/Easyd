<?php
	switch ($_REQUEST["type"]) {
		case 'give':
			echo '<h1>APPRAISAL</h1>
				<form action="Human_Resources/Appraisal/give.php" method="POST">
					<section>
						<input type="text" name="fname" id="fname" class="fill" required placeholder="FIRM NAME">
						<input type="text" name="pname" id="pname" class="fill" required placeholder="PROJECT NAME">
					</section>
					<input type="text" name="empname" id="empname" class="fill" required placeholder="EMPLOYEE NAME">
					<br>
					<h4>KPI: GRADES(1-4, 1=BEST, 4=WORST)</h4>
					<input type="number" min="1" max="4" name="feedback" id="feedfoll" class="fill" required placeholder="FEEDBACK AND FOLLOWUP">
					<input type="number" min="1" max="4" name="owner" id="owner" class="fill" required placeholder="OWNERSHIP OF PROJECT">
					<input type="number" min="1" max="4" name="formating" id="format" class="fill" required placeholder="FORMATTING AND ACCURACY">
					<input type="number" min="1" max="4" name="enthusiasm" id="enthusiasm" class="fill" required placeholder="ENTHUSIASM AND ATTITUDE">
					<input type="number" min="1" max="4" name="detail" id="detail" class="fill" required placeholder="EYE FOR DETAIL AND PRECISION">
					<input type="number" min="1" max="4" name="client_remarks" id="clirem" class="fill" required placeholder="CLIENT REMARKS">
					<input type="number" min="1" max="4" name="adminremark" id="leadrem" class="fill" required placeholder="LEADER REMARKS">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="CLEAR">
					</article>
				</form>
				<script>
					$(function() {
						$(\'#fname\').autocomplete({
							source: "Human_Resources/Appraisal/autocompletename.php"
						});
						$(\'#empname\').autocomplete({
							source: "Human_Resources/Appraisal/ac.php"
						});
						$(\'#pname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Human_Resources/Appraisal/autocompletepname.php",
									dataType: "json",
									data: {
										term : request.term,
										fname : $("#fname").val()
									},
									success: function(data) {
										response(data);
									}
								});
							},
							html: true
						});
					});
				</script>';
			break;
		case 'view':
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM appraisal";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
			<tr>
				<th>PROJECT</th>
				<th>FEEDBACK</th>
				<th>OWNER</th>
				<th>FORMATTING</th>
				<th>ENTHUSIASM</th>
				<th>DETAIL</th>
				<th>SUBMITTED BY</th>
				<th>CLIENT REMARKS</th>
				<th>ADMIN REMARKS</th>
			</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["pro_name"] . '</td>
				<td>' . $row["feedback"] . '</td>
				<td>' . $row["owner"] . '</td>
				<td>' . $row["formating"] . '</td>
				<td>' . $row["enthusiasm"] . '</td>
				<td>' . $row["detail"] . '</td>
				<td>' . $row["submitted_by"] . '</td>
				<td>' . $row["client_remarks"] . '</td>
				<td>' . $row["adminremark"] . '</td>
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