<?php
	switch ($_REQUEST["type"]) {
		case 'new':
			echo '<h1>NEW PROJECT</h1>
				<form action="Project_Management/Preproject/insert.php" method="POST">
					<div class="box">
						<h4>FIRM DETAILS</h4>
						<input class="fill" type="text" id="name" required placeholder="NAME" name="name">
						<input class="fill" type="text" id="address" required placeholder="ADDRESS" name="address">
						<input class="fill" type="text" id="sector" required placeholder="SECTOR" name="sector">
						<input class="fill" type="text" id="reason" required placeholder="REASON FOR MEETING" name="reason">
						<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
						<input class="fill" type="text" id="pdesc" required placeholder="PROJECT DESCRIPTION" name="pdesc">
						<input class="fill" type="text" id="conc" required placeholder="CONCLUSION" name="conc">
						<article>
							<input type="submit" value="SUBMIT">
							<input type="reset" value="CLEAR">
						</article>
					</div>
				</form>
				<form action="Project_Management/Preproject/insert.php" method="POST">
					<div class="box">
						<h4>CONTACT DETAILS</h4>
						<input class="fill" type="text" id="name" required placeholder="NAME" name="name">
						<input class="fill" type="text" id="desig" required placeholder="DESIGNATION" name="desig">
						<input class="fill" type="emal" id="email" required placeholder="EMAIL" name="email">
						<input class="fill" type="text" id="mobile" required placeholder="MOBILE NO" name="mobile">
						<article>
							<input type="submit" value="SUBMIT">
							<input type="reset" value="CLEAR">
						</article>
					</div>
				</form>';
			break;
		case 'existing':
			echo '<h1>EXISTING PROJECT</h1>
				<form action="Project_Management/Preproject/existing.php" method="POST">
					<input class="fill" type="text" id="firmname" required placeholder="FIRM NAME" name="firmname">
					<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="projectname">
					<div class="box">
						<h4>UPDATE PROJECT DETAILS</h4>
						<article>
							<h4>STATUS</h4>
							<select name="status">
								<option value="Approved">APPROVED</option>
								<option value="Cancelled">CANCELLED</option>
							</select>
						</article>
						<article>
							<input type="submit" value="SUBMIT">
							<input type="reset" value="CLEAR">
						</article>
					</div>
				</form>
				<form action="Project_Management/Preproject/insert.php" method="POST">
					<div class="box">
						<h4>CONTACT DETAILS</h4>
						<input class="fill" type="text" id="name" required placeholder="NAME" name="name">
						<input class="fill" type="text" id="desig" required placeholder="DESIGNATION" name="desig">
						<input class="fill" type="emal" id="email" required placeholder="EMAIL" name="email">
						<input class="fill" type="text" id="mobile" required placeholder="MOBILE NO" name="mobile">
						<article>
							<input type="submit" value="SUBMIT">
							<input type="reset" value="CLEAR">
						</article>
					</div>
				</form>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>