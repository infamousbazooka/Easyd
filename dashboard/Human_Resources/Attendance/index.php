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
				<form action="updateleaveapplication.php">
					<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="empid">
					<input class="fill" type="text" id="empname" class = "ui-autocomplete input" autocomplete="off" required placeholder="EMPLOYEE NAME" name="empname">
					<input class="fill" type="text" id="eleaves" required placeholder="EXISTING LEAVES" name="eleaves">
					<input class="fill" type="text" id="nleaves" required placeholder="NEW LEAVES" name="nleaves">
					<input class="fill" type="text" id="tleaves" required placeholder="TOTAL LEAVES" name="tleaves">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
					<script>
						$(function() {
							$(\'#empname\').autocomplete({
								source: "Human_Resources/Attendance/autocompletename.php",
								minLength: 2
							});
						});
					</script>
				</form>';
			break;
		case 'lreg':
			echo '<h1>LEAVE REGISTER</h1>
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
		case 'attreg':
			echo'';
			break;
		case 'gatt':
			echo'';
			break;
		case 'leaveapp':
			echo'';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>