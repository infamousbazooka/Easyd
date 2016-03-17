<?php
	switch ($_REQUEST["type"]) {
		case 'nlead':
			echo '<h1>NEW LEAD</h1>
				<form action="CRM/Flist/insert.php" method="POST">
					<h4 class="radio"><label><input type="radio" checked onclick="radioCheck()" id="nlead" name="leadtype" value="new"> NEW</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="elead" name="leadtype" value="past"> PAST CLIENT</label></h4>
					<section>
						<input class="fill" type="text" id="fname" required placeholder="FIRM NAME" name="firm_name">
						<input class="fill" type="text" id="pname" required placeholder="PROSPECT NAME" name="prospect_name">
					</section>
					<section>
						<input class="fill" type="email" id="email" required placeholder="EMAIL" name="email">
						<input class="fill" type="text" id="address" required placeholder="ADDRESS" name="address">
					</section>
					<section>
						<input class="fill" type="tel" id="phone" required placeholder="PHONE NUMBER" name="phone">
						<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="proj_associated">
					</section>
					<section>
						<input class="fill" type="text" id="sector" required placeholder="SECTOR" name="sector">
						<input class="fill" type="text" id="designation" required placeholder="DESIGNATION" name="designation">
					</section>
					<section>
						<input class="fill" type="text" id="followreason" required placeholder="FOLLOWUP REASON" name="follow_reason">
						<input class="fill" type="text" id="followreply" required placeholder="FOLLOWUP REPLY" name="follow_reply">
					</section>
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		
		case 'elead':
			echo '<h1>EXISTING LEAD</h1>
				<form action="CRM/Flist/existing.php" method="POST">
					<section>
						<input class="fill" type="text" id="fname" required placeholder="FIRM NAME" name="firm_name">
						<input class="fill" type="text" id="prname" required placeholder="PROSPECT NAME" name="prospect_name">
					</section>
					<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="proj_associated">
					<div class="box">
						<h3>NEW FOLLOWUP</h3>
						<input class="fill" type="text" id="followreason" required placeholder="FOLLOWUP REASON" name="follow_reason">
						<input class="fill" type="text" id="followreply" required placeholder="FOLLOWUP REPLY" name="follow_reply">
						<article>
							<input type="submit" value="UPDATE">
						</article>
					</div>
					<div class="box">
						<h3>HISTORY</h3>
						<article>
							<input type="button" onclick="viewflist()" value="VIEW">
						</article>
					</div>
				</form>
				<div id="display"></div>
				<script>
					$(function() {
						$(\'#fname\').autocomplete({
							source: "CRM/Flist/acname.php"
						});
						$(\'#prname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "CRM/Flist/acpr.php",
									dataType: "json",
									data: {
										term : request.term,
										fname : $("#fname").val()
									},
									success: function(data) {
										response(data);
									}
								});
							},
							html: true
						});
						$(\'#pname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "CRM/Flist/acp.php",
									dataType: "json",
									data: {
										term : request.term,
										fname : $("#fname").val(),
										prname : $("#prname").val()
									},
									success: function(data) {
										response(data);
									}
								});
							},
							html: true
						});
					});
				</script>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>