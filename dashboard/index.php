<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="icon.png" sizes="16x16" type="image/png">
	<meta name="author" content="Magnus Fernandes - AmberZile">
	<meta name="description" content="EasyD for Svastek">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>EasyD | Dashboard</title>
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
					<h4>Magnus Fernandes</h4>
					<h4>Cleaner</h4>
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
								<li><h4>BIO-DATA</h4></li>
								<li><a href="#"><h4>INCENTIVES</h4></a></li>
								<li><a href="#"><h4>APPRAISAL</h4></a></li>
								<li><a href="#"><h4>INTERVIEWS</h4></a></li>
								<li><a href="#"><h4>CIRCULAR</h4></a></li>
								<li><a href="#"><h4>SUGGESTIONS</h4></a></li>
								<li><a href="#"><h4>PROFILE</h4></a></li>
								<li><a href="#"><h4>NEW STAFF</h4></a></li>
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
						<li><a href="#"><h4>ON PROJECT</h4></a></li>
						<li><a href="#"><h4>OPEN PROJECT</h4></a></li>
						<li><a href="#"><h4>MEETINGS</h4></a></li>
						<li><a href="#"><h4>COMPANY CALENDAR</h4></a></li>
						<li><a href="#"><h4>TIME TRACKER</h4></a></li>
						<li><a href="#"><h4>PRE PROJECT</h4></a></li>
						<li><a href="#"><h4>POST PROJECT</h4></a></li>
						<li><a href="#"><h4>REIMBURSEMENTS</h4></a></li>
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
						<li><a href="#"><h4>NEW REGISTRATION</h4></a></li>
						<li><a href="#"><h4>CHANGE PASSWORD</h4></a></li>
					</ul>
				</h4></a></li>
			</ul>
		</section>
		<section class="body" id="body">

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