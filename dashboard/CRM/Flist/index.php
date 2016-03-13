<?php
	switch ($_REQUEST["type"]) {
		case 'nlead':
			echo '<h1>NEW LEAD</h1>
				<form action="leaveapplication.php">
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="nlead" name="newlead" value="sector"> NEW</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="elead" name="newlead" value="general"> PAST CLIENT</label></h4>
					<section>
						<input class="fill" type="text" id="fname" required placeholder="FIRM NAME" name="fname">
						<input class="fill" type="text" id="pname" required placeholder="PROSPECT NAME" name="pname">
					</section>
					<section>
						<input class="fill" type="email" id="email" required placeholder="EMAIL" name="email">
						<input class="fill" type="text" id="address" required placeholder="ADDRESS" name="address">
					</section>
					<section>
						<input class="fill" type="tel" id="phone" required placeholder="PHONE NUMBER" name="phone">
						<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="projectname">
					</section>
					<section>
						<input class="fill" type="text" id="sector" required placeholder="SECTOR" name="sector">
						<input class="fill" type="text" id="designation" required placeholder="DESIGNATION" name="designation">
					</section>
					<section>
						<input class="fill" type="text" id="followreason" required placeholder="FOLLOWUP REASON" name="followreason">
						<input class="fill" type="text" id="followreply" required placeholder="FOLLOWUP REPLY" name="followreply">
					</section>
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		
		case 'elead':
			echo '<h1>EXISTING LEAD</h1>
				<form action="leaveapplication.php">
					<section>
						<input class="fill" type="text" id="fname" required placeholder="FIRM NAME" name="fname">
						<input class="fill" type="text" id="pname" required placeholder="PROSPECT NAME" name="pname">
					</section>
					<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
					<div class="box">
						<h3>HISTORY</h3>
						<article>
							<input type="button" value="VIEW">
						</article>
					</div>
					<div class="box">
						<h3>NEW FOLLOWUP</h3>
						<input class="fill" type="text" id="followreason" required placeholder="FOLLOWUP REASON" name="followreason">
						<input class="fill" type="text" id="followreply" required placeholder="FOLLOWUP REPLY" name="followreply">
						<article>
							<input type="submit" value="UPDATE">
						</article>
					</div>
				</form>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>