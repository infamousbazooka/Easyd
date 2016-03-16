<?php
	switch ($_REQUEST["type"]) {
		case 'atten':
			echo '<h1>ATTENDANCE</h1>
				<form action="Performance/Manage/view.php" method="POST">
					<input type="text" name="name" id="intname" class="fill" required placeholder="INTERVIEWEE NAME">
					<input type="text" name="decision" id="decision" class="fill" id="decision" required placeholder="DECISION">
					<article>
						<h4>UPDATE</h4>
						<select name="status">
							<option value="Accepted">ACCEPT</option>
							<option value="Declined">DECLINE</option>
						</select>
					</article>
					<article>
						<input type="submit" value="SUBMIT">
					</article>
					<script>
						$(function() {
							$(\'#intname\').autocomplete({
								source: "Human_Resources/Interviews/autocompletename.php",
								minLength: 2
							});
						});
					</script>
				</form>';
			break;
		case 'proj':
			echo "jrwn";
			break;
		default:
			echo "nothin";
			break;
	}
	
?>