<?php
	switch ($_REQUEST["type"]) {
		case 'attendance':
			echo ('<div class="title"><h1>ATTENDANCE</h1></div>
					<div class="links">
						<h4 onclick="getForm(\'attendance\', \'leave\')">APPLY FOR LEAVE</h4>
						<h4 onclick="getForm(\'attendance\', \'lreg\')">LEAVE REGISTER</h4>
						<h4 onclick="getForm(\'attendance\', \'attreg\')">COMPANY ATTENDANCE REGISTER</h4>
						<h4 onclick="giveattendance()">GIVE ATTENDANCE</h4>
						<h4 onclick="getForm(\'attendance\', \'leaveapp\')">LEAVE APPLICATIONS</h4>
						<h4 onclick="getForm(\'attendance\', \'update\')">UPDATE LEAVE QUOTA</h4>
					</div>
					<div id="form" class="form"></div>');
			break;
		case 'payroll':
			echo ('<div class="title"><h1>PAYROLL</h1></div>
					<div class="links">
						<h4 onclick="getForm(\'payroll\', \'sreg\')">YOUR SALARY REGISTER</h4>
						<h4 onclick="getForm(\'payroll\', \'creg\')">COMPANY SALARY REGISTER</h4>
						<h4 onclick="getForm(\'payroll\', \'add\')">ADD SALARIES</h4>
					</div>
					<div id="form" class="form"></div>');
			break;
		case 'biodata':
			echo ('<div class="form">
				<h1>BIO-DATA</h1>
			</div>');
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT empid, name, cv_path FROM employee_detail";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
				<tr>
					<th>EMPID</th>
					<th>NAME</th>
					<th>CV PATH</th>
				</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["empid"] . '</td>
				<td>' . $row["name"] . '</td>
				<td><a href="' . $row["cv_path"] . '">' . $row["cv_path"] . '</a></td>
			</tr>';
			    }
			}
			else{
				echo "NO TABLES FOUND";
			}
			echo "</table>";
			$conn->close();
			break;
		case 'incentives':
			echo ('<div class="form">
				<h1>INCENTIVES</h1>
				<form action="Human_Resources/Incentives/" method="POST">
					<section>
						<input type="text" name="empname" id="empname" class="fill" required placeholder="EMPLOYEE NAME">
						<input type="number" name="amount" id="amount" class="fill" required placeholder="AMOUNT">
					</section>
					<input type="text" name="reason" id="reason" class="fill" required placeholder="REASON FOR INCENTIVE">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="CLEAR">
					</article>
				</form>
				<script>
					$(function() {
						$(\'#empname\').autocomplete({
							source: "Human_Resources/Incentives/autocompletename.php",
							minLength: 2
						});
					});
				</script>
			</div>');
			break;
		case 'circular':
			echo ('<div class="form">
				<h1>UPLOAD CIRCULAR</h1>
				<form action="Human_Resources/Circular/upload.php" method="POST" enctype="multipart/form-data">
					<input class="fill" name="title" placeholder="TITLE" required>
					<input type="file" required name="cirfile">
					<article>
						<input type="submit" value="UPLOAD">
					</article>
				</form>
				<h1>VIEW/DOWNLOAD CIRCULAR</h1>');
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT * FROM circular";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo '<table class="pure-table pure-table-bordered">
				<tr>
					<th>LINK FOR CIRCULAR</th>
					<th>CODE</th>
				</tr>';
			    while($row = $result->fetch_assoc()) {
			    	echo '<tr>
				<td>' . $row["link"] . '</td>
				<td><a href="' . $row["link"] . '">' . $row["link"] . '</a></td>
			</tr>';
			    }
			}
			else{
				echo "NO TABLES FOUND";
			}
			echo "</table>";
			$conn->close();
			echo('</div>');
			break;
		case 'appraisal':
			echo ('<div class="title"><h1>APPRAISAL</h1></div>
					<div class="links">
						<h4 onclick="getForm(\'appraisal\', \'give\')">GIVE APPRAISAL</h4>
						<h4 onclick="getForm(\'appraisal\', \'view\')">VIEW APPRAISAL SHEET</h4>
					</div>
					<div id="form" class="form"></div>');
			break;
		case 'interviews':
			echo ('<div class="title"><h1>INTERVIEWS</h1></div>
					<div class="links">
						<h4 onclick="getForm(\'interview\', \'new\')">NEW INTERVIEW</h4>
						<h4 onclick="getForm(\'interview\', \'update\')">UPDATE RESULTS</h4>
					</div>
					<div id="form" class="form"></div>');
			break;
		case 'suggest':
			echo ('<div class="title"><h1>SUGGESTIONS</h1></div>
					<div class="links">
						<h4 onclick="getForm(\'suggest\', \'view\')">VIEW SUGGESTIONS</h4>
						<h4 onclick="getForm(\'suggest\', \'give\')">GIVE SUGGESTIONS</h4>
					</div>
					<div id="form" class="form"></div>');
			break;
		case 'profile':
			echo ('<div class="form">
				<h1>PROFILE</h1>
				<form action="leaveapplication.php">
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="individual" checked name="profileview" value="individual"> INDIVIDUAL</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="company" name="profileview" value="company"> COMPANY</label></h4>
					<input class="fill" type="text" name="empname" id="empname" required placeholder="EMPLOYEE NAME">
					<article>
						<input type="button" id="viewprof" onclick="viewpro()" value="VIEW PROFILE">
					</article>
				</form>
				<div id="display"></div>
			</div>
				<script>
					$(function() {
						$(\'#empname\').autocomplete({
							source: "Human_Resources/Profile/ac.php"
						});
					});
				</script>');
			break;
		case 'staff':
			echo '<div class="form">
	<h1>STAFF REGISTRATION</h1>
	<form action="Human_Resources/Staff/insert.php" method="POST" enctype="multipart/form-data">
		<section>
			<input class="fill" type="text" id="pname" required placeholder="NAME" name="name">
			<input class="fill" type="email" id="email" required placeholder="EMAIL" name="email">
		</section>
		<section>
			<input class="fill" type="text" id="address" required placeholder="PERMANENT ADDRESS" name="address">
			<input class="fill" type="tel" id="contact" required placeholder="CONTACT NO" name="contact">
		</section>
		<section>
			<input class="fill" type="text" id="bank" required placeholder="BANK" name="bank">
		</section>
		<article>
			<h4>CATEGORY</h4>
			<select id="category" onclick="combo()">
				<option value="owner">OWNER</option>
				<option value="hr">HUMAN RESOURCES</option>
				<option value="acc">ACCOUNTS</option>
				<option value="emp">EMPLOYEE</option>
			</select>
		</article>
		<article>
			<h4>POST</h4>
			<select id="posttype" name="posttype">
				<option value="Propreitor">PROPREITOR</option>
			</select>
		</article>
		<input class="fill" type="text" id="from" required placeholder="DATE OF BIRTH" name="dob">
		<input class="fill" type="text" id="to" required placeholder="JOINING DATE" name="join">
		<article class="file">
			<h4>Qualification Document</h4>
			<input type="file" required name="quafile" id="quafile">
		</article>
		<article class="file">
			<h4>Your CV</h4>
			<input type="file" required name="cvfile" id="cvfile">
		</article>
		<article>
			<input type="submit" value="SUBMIT">
			<input type="reset" value="RESET">
		</article>
	</form>
</div>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>