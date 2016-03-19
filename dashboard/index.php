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
	<link rel="stylesheet" href="../css/pure-min.css">
	<script src="../js/lib/jquery.min.js"></script>
	<script src="../js/lib/jquery-ui.min.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>
	<div class="mainwrapper">
		<section class="menu">
			<div class="info">
				<article class="information">
					<?php
						echo "<h4>" . $username . "</h4><h4>" . $name . "</h4>";
					?>
					<a href="logout.php"><h4 id="logout">LOGOUT</h4></a>
					<script>
						$('#logout').click(function(event) {
							$.ajax({
								url: 'logout.php'
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
							
						});
					</script>
				</article>
			</div>
			<ul>
				<li>
					<a href="#">
						<h4 class="h4">
							<i class="fa fa-archive"></i>HUMAN RESOURCES
							<ul class="inner-ul">
								<li><h4 onclick="getType('hr','attendance')">ATTENDANCE</h4></li>
								<li><h4 onclick="getType('hr','payroll')">PAYROLL</h4></li>
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
				<li><a href="#"><h4 onclick="getType('perf', 'view')"class="h4"><i class="fa fa-asterisk"></i>PERFORMANCE</h4></a></li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-asterisk"></i>DOCUMENT MANAGER
					<ul class="inner-ul">
						<li><h4 id="reports">PROJECT REPORTS</h4></li>
						<script>
							$('#reports').click(function(event) {
								getType('document', 'report');
							});
						</script>
					</ul>
				</h4></a></li>
				<li><a href="#"><h4 class="h4"><i class="fa fa-asterisk"></i>INVENTORY
					<ul class="inner-ul">
						<li><h4 onclick="getType('inventory', 'stock')">STOCK DETAILS</h4></li>
						<li><h4 onclick="getType('inventory', 'items')">ITEMS TO BE PURCHASED</h4></li>
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
		</section>
		<section class="footer">
			<p>MANGAL ADVISORY SERVICES</p>
		</section>
	</div>
</body>
</html>