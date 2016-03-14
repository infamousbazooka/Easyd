<?php
	switch ($_REQUEST["type"]) {
		case 'new':
			echo ('<div class="title"><h1>NEW REGISTRATION</h1></div>
				<div id="form" class="form">
					<form action="Employee_Registration/new.php" method="POST">
						<input class="fill" type="text" id="fname" required placeholder="FULL NAME" name="name">
						<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="empid">
						<input class="fill" type="password" id="pass" onkeyup="checkPasswordMatch()" required placeholder="PASSWORD" name="pass">
						<input class="fill" type="password" id="rpass" onkeyup="checkPasswordMatch()" required placeholder="RETYPE PASSWORD" name="rpass">
						<article>
							<input type="submit" id="ret" disabled="disabled" value="SUBMIT">
							<input type="reset" value="RESET">
						</article>
					</form>
				</div>');
			break;

		case 'change':
			echo ('<div class="title"><h1>CHANGE PASSWORD</h1></div>
				<div id="form" class="form">
					<form action="Employee_Registration/change.php" method="POST">
						<input class="fill" type="text" id="fname" required placeholder="FULL NAME" name="name">
						<input class="fill" type="password" id="cpass" required placeholder="CURRENT PASSWORD" name="cpass">
						<input class="fill" type="password" id="pass" onkeyup="checkPasswordMatch()" required placeholder="NEW PASSWORD" name="pass">
						<input class="fill" type="password" id="rpass" onkeyup="checkPasswordMatch()" required placeholder="RETYPE NEW PASSWORD" name="rpass">
						<article>
							<input type="submit" id="ret" disabled="disabled" value="SUBMIT">
							<input type="reset" value="RESET">
						</article>
					</form>
				</div>');
			break;
		default:
			echo "nothin";
			break;
	}
	
?>