<?php
	session_start();
	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../');
	}
	else{
		$username = $_SESSION["username"];
		$name = $_SESSION["name"];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="icon.png" sizes="16x16" type="image/png">
	<meta name="author" content="Magnus Fernandes - AmberZile">
	<meta name="description" content="EasyD for Svastek">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>EasyD | Dashboard</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.min.css">
	<link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
	<div class="mainwrapper">
		<section class="menu">
			<div class="info">
				<article class="dp">
					<img src="../images/profile.png" class="img-responsive" alt="Profile picture">
				</article>
				<article class="information">
					<?php
						echo "<h4>" . $username . "</h4><h4>" . $name . "</h4>";
					?>
				</article>
			</div>
			<ul>
				<li>
					<a href="#">
						<h4 class="h4">
							<i class="fa fa-archive"></i>HUMAN RESOURCES
							<ul class="inner-ul">
								<li><h4 onclick="getType('hr','attendance')">ATTENDANCE</h4></li>
								<li><h4 onclick="getType('hr','ask')">PAYROLL</h4></li>
								<li><h4 onclick="getType('hr','biodata')">BIO-DATA</h4></li>
								<li><h4 onclick="getType('hr','incentives')">INCENTIVES</h4></li>
								<li><h4 onclick="getType('hr','appraisal')">APPRAISAL</h4></li>
								<li><h4 onclick="getType('hr','interviews')">INTERVIEWS</h4></li>
								<li><h4 onclick="getType('hr','circular')">CIRCULAR</h4></li>
								<li><h4 onclick="getType('hr','suggest')">SUGGESTIONS</h4></li>
								<li><h4 onclick="getType('hr','profile')">PROFILE</h4></li>
								<li><h4 onclick="getType('hr','staff')">NEW STAFF</h4></li>
							</ul>
						</h4>
					</a>
				</li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-briefcase"></i>CRM
					<ul class="inner-ul">
						<li><h4 onclick="getType('crm', 'client')">CLIENT</h4></li>
						<li><h4 onclick="getType('crm', 'followup')">FOLLOWUP</h4></li>
					</ul>
				</h4></a></li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-bomb"></i>PROJECT
					<ul class="inner-ul">
						<li><h4 onclick="getType('project', 'onproject')">ON PROJECT</h4></li>
						<li><h4 onclick="getType('project', 'openproject')">OPEN PROJECT</h4></li>
						<li><h4 onclick="getType('project', 'meetings')">MEETINGS</h4></li>
						<li><h4 onclick="getType('project', 'companycalendar')">COMPANY CALENDAR</h4></li>
						<li><h4 onclick="getType('project', 'timetracker')">TIME TRACKER</h4></li>
						<li><h4 onclick="getType('project', 'preproject')">PRE PROJECT</h4></li>
						<li><h4 onclick="getType('project', 'postproject')">POST PROJECT</h4></li>
						<li><h4 onclick="getType('project', 'reimbursements')">REIMBURSEMENTS</h4></li>
					</ul>
				</h4></a></li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-asterisk"></i>PERFORMANCE</h4></a></li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-asterisk"></i>DOCUMENT MANAGER
					<ul class="inner-ul">
						<li><a href="#"><h4>UPLOAD FILE</h4></a></li>
						<li><a href="#"><h4>OPEN FILE</h4></a></li>
						<li><a href="#"><h4>PROJECT REPORTS</h4></a></li>
					</ul>
				</h4></a></li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-asterisk"></i>INVENTORY
					<ul class="inner-ul">
						<li><a href="#"><h4>STOCK DETAILS</h4></a></li>
						<li><a href="#"><h4>ITEMS TO BE PURCHASED</h4></a></li>
					</ul>
				</h4></a></li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-asterisk"></i>EMPLOYEE REGISRATION
					<ul class="inner-ul">
						<li><h4 onclick="getType('empreg', 'new')">NEW REGISTRATION</h4></li>
						<li><h4 onclick="getType('empreg', 'change')">CHANGE PASSWORD</h4></li>
					</ul>
				</h4></a></li>
			</ul>
		</section>
		<section class="body" id="body">
			<div class="form">
				<h1>INCENTIVE</h1>
				<form action="leaveapplication.php">
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
			</div>
		</section>
		<section class="footer">
			<p>Footer text here.</p>
		</section>
	</div>
<script src="../js/lib/jquery.min.js"></script>
<script src="../js/lib/jquery-ui.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>