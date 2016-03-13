<?php
	switch ($_REQUEST["type"]) {
		case 'attendance':
			echo ('<div class="title"><h1>ATTENDANCE</h1></div>
					<div class="links">
						<h4 onclick="getForm(\'attendance\', \'leave\')">APPLY FOR LEAVE</h4>
						<h4>LEAVE REGISTER</h4>
						<h4>COMPANY ATTENDANCE REGISTER</h4>
						<h4>GIVE ATTENDANCE</h4>
						<h4>LEAVE APPLICATIONS</h4>
						<h4 onclick="getForm(\'attendance\', \'update\')">UPDATE LEAVE QUOTA</h4>
					</div>
					<div id="form" class="form"></div>');
			break;
		case 'biodata':
			echo ('<div class="form">
				<h1>BIO-DATA</h1>
			</div>');
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
							source: "Human_Resources/Attendance/autocompletename.php",
							minLength: 2
						});
					});
				</script>
			</div>');
			break;
		case 'circular':
			echo ('<div class="form">
				<h1>UPLOAD CIRCULAR</h1>
				<form action="leaveapplication.php">
					<article>
						<input type="submit" value="UPLOAD">
					</article>
				</form>
				<h1>VIEW/DOWNLOAD CIRCULAR</h1>
			</div>');
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
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="individual" name="profileview" value="individual"> INDIVIDUAL</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="company" name="profileview" value="company"> COMPANY</label></h4>
					<input class="fill" type="text" name="empname" id="empname" required placeholder="EMPLOYEE NAME">
					<article>
						<input type="submit" value="VIEW PROFILE">
					</article>
				</form>
			</div>');
			break;
		case 'staff':
			echo '<div class="form">
					<h1>STAFF REGISTRATION</h1>
					<form action="leaveapplication.php">
						<section>
							<input class="fill" type="text" id="pname" required placeholder="NAME" name="pname">
							<input class="fill" type="text" id="workacc" required placeholder="EMAIL" name="workacc">
						</section>
						<section>
							<input class="fill" type="number" id="hours" required placeholder="PERMANENT ADDRESS" name="hours">
							<input class="fill" type="text" id="marketing" required placeholder="CONTACT NO" name="marketing">
						</section>
						<section>
							<input class="fill" type="text" id="mwacc" required placeholder="BANK" name="wacc">
						</section>
						<article>
							<h4>CATEGORY</h4>
							<select id="category">
								<option value="owner">OWNER</option>
								<option value="hr">HUMAN RESOURCES</option>
								<option value="acc">ACCOUNTS</option>
								<option value="emp">EMPLOYEE</option>
							</select>
						</article>
						<article>
							<h4>POST</h4>
							<select id="posttype">
								<option value="prop">PROPREITOR</option>
							</select>
						</article>
						<section>
							<input class="fill" type="text" id="awacc" required placeholder="ADMIN WORK ACCOMPLISHED" name="awacc">
							<input class="fill" type="text" id="ope" required placeholder="OPE" name="ope">
						</section>
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