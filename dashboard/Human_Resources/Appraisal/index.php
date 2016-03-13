<?php
	switch ($_REQUEST["type"]) {
		case 'give':
			echo '<h1>APPRAISAL</h1>
				<form action="Human_Resources/Appraisal/give.php" method="POST">
					<section>
						<input type="text" name="fname" id="fname" class="fill" required placeholder="FIRM NAME">
						<input type="text" name="pname" id="pname" class="fill" required placeholder="PROJECT NAME">
					</section>
					<input type="text" name="empname" id="empname" class="fill" required placeholder="EMPLOYEE NAME">
					<br>
					<h4>KPI: GRADES(1-4, 1=BEST, 4=WORST)</h4>
					<input type="number" min="1" max="4" name="feedback" id="feedfoll" class="fill" required placeholder="FEEDBACK AND FOLLOWUP">
					<input type="number" min="1" max="4" name="owner" id="owner" class="fill" required placeholder="OWNERSHIP OF PROJECT">
					<input type="number" min="1" max="4" name="formating" id="format" class="fill" required placeholder="FORMATTING AND ACCURACY">
					<input type="number" min="1" max="4" name="enthusiasm" id="enthusiasm" class="fill" required placeholder="ENTHUSIASM AND ATTITUDE">
					<input type="number" min="1" max="4" name="detail" id="detail" class="fill" required placeholder="EYE FOR DETAIL AND PRECISION">
					<input type="number" min="1" max="4" name="client_remarks" id="clirem" class="fill" required placeholder="CLIENT REMARKS">
					<input type="number" min="1" max="4" name="adminremark" id="leadrem" class="fill" required placeholder="LEADER REMARKS">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="CLEAR">
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