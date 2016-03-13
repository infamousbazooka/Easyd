<?php
	switch ($_REQUEST["type"]) {
		case 'update':
			echo '<h1>INTERVIEW</h1>
				<form action="leaveapplication.php">
					<input type="text" name="name" id="name" class="fill" required placeholder="INTERVIEWEE NAME">
					<article>
						<h4>DECISION
						<input type="text" name="email" id="email" required placeholder="DECISION"></h4>
					</article>
					<article>
						<h4>UPDATE</h4>
						<select>
							<option value="accept">ACCEPT</option>
							<option value="decline">DECLINE</option>
						</select>
					</article>
					<article>
						<input type="submit" value="SUBMIT">
					</article>
				</form>';
			break;
		case 'new':
			echo '<h1>INTERVIEW</h1>
				<form action="leaveapplication.php">
					<section>
						<input type="text" name="name" id="name" class="fill" required placeholder="NAME">
						<input type="email" name="email" id="email" class="fill" required placeholder="EMAIL">
					</section>
					<section>
						<input type="text" name="address" id="address" class="fill" required placeholder="ADDRESS">
						<input type="text" name="contact" id="contact" class="fill" required placeholder="CONTACT NO">
					</section>
					<section>
						<input type="text" name="interby" id="interby" class="fill" required placeholder="INTERVIEWED BY">
						<input type="text" name="status" id="status" class="fill" required disabled="true" placeholder="STATUS">
					</section>
					<article>
						<h4>CATEGORY</h4>
						<select id="category">
							<option value="hr">HUMAN RESOURCES</option>
							<option value="acc">ACCOUNTS</option>
							<option value="emp">EMPLOYEE</option>
						</select>
					</article>
					<article>
						<h4>POST</h4>
						<select id="posttype">
							<option value="hrman">MANAGER</option>
							<option value="hrexec">EXECUTIVE</option>
						</select>
					</article>
					<section>
						<input class="fill" type="text" id="start" required placeholder="INTERVIEWED ON" name="interdate">
						<input class="fill" type="text" id="end" required placeholder="DATE OF BIRTH" name="dob">
					</section>
					<input type="text" name="remarks" id="remarks" class="fill" required placeholder="REMARKS/GRADES">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="CLEAR">
					</article>
				</form>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>