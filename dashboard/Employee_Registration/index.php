<?php
	switch ($_REQUEST["type"]) {
		case 'new':
			echo ('<div class="title"><h1>NEW REGISTRATION</h1></div>
				<div id="form" class="form">
					<form action="d.php">
						<input class="fill" type="text" id="fname" required placeholder="FULL NAME" name="fname">
						<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="empid">
						<input class="fill" type="password" id="pass" required placeholder="PASSWORD" name="pass">
						<input class="fill" type="password" id="rpass" required placeholder="RETYPE PASSWORD" name="rpass">
						<article>
							<input type="submit" value="SUBMIT">
							<input type="reset" value="RESET">
						</article>
					</form>
				</div>');
			break;

		case 'change':
			echo ('<div class="title"><h1>CHANGE PASSWORD</h1></div>
				<div id="form" class="form">
					<form action="d.php">
						<input class="fill" type="text" id="fname" required placeholder="FULL NAME" name="fname">
						<input class="fill" type="password" id="cpass" required placeholder="CURRENT PASSWORD" name="cpass">
						<input class="fill" type="password" id="npass" required placeholder="NEW PASSWORD" name="npass">
						<input class="fill" type="password" id="rpass" required placeholder="RETYPE NEW PASSWORD" name="rpass">
						<article>
							<input type="submit" value="SUBMIT">
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