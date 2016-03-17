<?php
	switch ($_REQUEST["type"]) {
		case 'leave':
			echo '<h1>LEAVE APPLICATION</h1>
						<form action="Human_Resources/Attendance/leaveapplication.php" method="POST">
							<input class="fill" type="text" id="from" required placeholder="FROM" name="from">
							<input class="fill" type="text" id="to" required placeholder="TO" name="to">
							<textarea class="fill" name="reason" required placeholder="REASON FOR LEAVE"></textarea>
							<article>
								<input type="submit" value="SUBMIT">
								<input type="reset" value="RESET">
							</article>
						</form>';
			break;
		case 'update':
			echo '<h1>UPDATE LEAVE QUOTA</h1>
				<form action="Human_Resources/Attendance/updateleaveapplication.php" method="POST">
					<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="id">
					<input class="fill" type="text" id="empname" readonly="readonly" class = "ui-autocomplete input" autocomplete="off" required placeholder="EMPLOYEE NAME" name="empname">
					<input class="fill" type="text" id="eleaves" disabled="disabled" required placeholder="EXISTING LEAVES" name="eleaves">
					<input class="fill" type="text" id="nleaves" onkeyup="add()" required placeholder="NEW LEAVES" name="nleaves">
					<input class="fill" type="text" id="tleaves" readonly="readonly" required placeholder="TOTAL LEAVES" name="quota">
					<article>
						<input type="submit" value="UPDATE">
						<input type="reset" value="RESET">
					</article>
					<script>
						$(function() {
							var id = "";
							$(\'#empid\').autocomplete({
								source: function(request, response) {
									$.ajax({
										url: "Human_Resources/Attendance/autocompletename.php",
										dataType: "json",
										data: {
											term : request.term
										},
										success: function(data) {
											response(data);
											id = data[0];
										}
									});
								},
								html: true,
								select: function(event,ui){
									$.ajax({
										url: "Human_Resources/Attendance/getter.php",
										dataType: "json",
										data: {param1: id},
										success: function(data) {
											console.log(JSON.stringify(data));
											var first = data[0];
											$("#empname").val(first.empname);
											$("#eleaves").val(first.quota);
										}
									})
									.done(function() {
										console.log("success");
									})
									.fail(function() {
										console.log("error");
									})
									.always(function() {
										console.log("complete");
									});
								}
							});
						});
					</script>
				</form>';
			break;
		case 'attreg':
			echo '<h1>COMPANY ATTENDANCE REGISTER</h1>
				<form action="">
					<h4 class="radio"><label><input type="radio" checked onclick="radioCheck()" id="indiv" name="leavereg" value="indiv"> INDIVIDUAL</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="comp" name="leavereg" value="comp"> COMPANY</label></h4>
					<input type="text" class="fill" name="empname" onkeyup="checkviewindi()" id="empname" required placeholder="EMPLOYEE NAME">
					<article>
						<h4>MONTH</h4>
						<select id="month">
							<option value="jan">JANUARY</option>
							<option value="feb">FEBRUARY</option>
							<option value="mar">MARCH</option>
							<option value="apr">APRIL</option>
							<option value="may">MAY</option>
							<option value="jun">JUNE</option>
							<option value="jul">JULY</option>
							<option value="aug">AUGUST</option>
							<option value="sept">SEPTEMBER</option>
							<option value="oct">OCTOBER</option>
							<option value="nov">NOVEMBER</option>
							<option value="dec">DECEMBER</option>
						</select>
					</article>
					<article>
						<h4>YEAR</h4>
						<select id="year">
							<option value="2016">2016</option>
							<option value="2017">2017</option>
						</select>
					</article>
					<article>
						<input type="button" onclick="viewind()" disabled="disabled" value="VIEW" id="viewindi">
					</article>
				</form>
				<div id="display"></div>';
			break;
		case 'lreg':
			session_start();
			$username = $_SESSION["username"];
			$name = $_SESSION["name"];
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM leave_applications WHERE empid='" . $username . "' AND empname='" . $name . "'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
			<tr>
				<th>FROM</th>
				<th>TO</th>
				<th>APPLICATION DATE</th>
				<th>REASON</th>
				<th>APPROVAL STATUS</th>
			</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["from1"] . '</td>
				<td>' . $row["to1"] . '</td>
				<td>' . $row["application_date"] . '</td>
				<td>' . $row["reason"] . '</td>
				<td>' . $row["approval_status"] . '</td>
			</tr>';
			    }
			}
			else{
				echo "NO TABLES FOUND";
			}
			echo "</table>";
			$conn->close();
			break;
		case 'leaveapp':
			session_start();
			$username = $_SESSION["username"];
			$name = $_SESSION["name"];
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM leave_applications WHERE empid='" . $username . "' AND empname='" . $name . "'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
			<tr>
				<th>FROM</th>
				<th>TO</th>
				<th>APPLICATION DATE</th>
				<th>REASON</th>
				<th>APPROVAL STATUS</th>
			</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["from1"] . '</td>
				<td>' . $row["to1"] . '</td>
				<td>' . $row["application_date"] . '</td>
				<td>' . $row["reason"] . '</td>
				<td>' . $row["approval_status"] . '</td>
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
			echo "<h1>RELOAD PAGE</h1>";
			break;
	}
	
?>
