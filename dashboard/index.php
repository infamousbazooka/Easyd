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
					<h4>Name name</h4>
					<h4>Designation</h4>
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
				<h1>NEW REGISTRATION</h1>
				<form action="leaveapplication.php">
					<section>
						<input class="fill" type="text" id="date" required placeholder="DATE" name="date">
						<input class="fill" type="text" id="cname" required placeholder="CLIENT NAME" name="cname">
					</section>
					<section>
						<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
						<input class="fill" type="text" id="workacc" required placeholder="WORK ACCOMPLISHED" name="workacc">
					</section>
					<section>
						<input class="fill" type="number" id="hours" required placeholder="NO OF HOURS" name="hours">
						<input class="fill" type="text" id="marketing" required placeholder="MARKETING" name="marketing">
					</section>
					<section>
						<input class="fill" type="text" id="mwacc" required placeholder="MARKETING WORK ACCOMPLISHED" name="wacc">
						<input class="fill" type="text" id="admin" required placeholder="ADMIN" name="admin">
					</section>
					<section>
						<input class="fill" type="text" id="awacc" required placeholder="ADMIN WORK ACCOMPLISHED" name="awacc">
						<input class="fill" type="text" id="ope" required placeholder="OPE" name="ope">
					</section>
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
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