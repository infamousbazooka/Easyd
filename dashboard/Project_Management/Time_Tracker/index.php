<?php
	switch ($_REQUEST["type"]) {
		case 'edit':
			echo '<h1>NEW REGISTRATION</h1>
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
				</form>';
			break;
		case 'view':
			echo '';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>