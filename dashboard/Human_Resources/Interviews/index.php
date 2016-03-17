<?php
	switch ($_REQUEST["type"]) {
		case 'update':
			echo '<h1>INTERVIEW</h1>
				<form action="Human_Resources/Interviews/update.php" method="POST">
					<input type="text" name="name" id="intname" class="fill" required placeholder="INTERVIEWEE NAME">
					<input type="text" name="decision" id="decision" class="fill" id="decision" readonly="readonly" required placeholder="DECISION">
					<article id="status">
						<h4>UPDATE</h4>
						<select name="status">
							<option value="Accepted">ACCEPT</option>
							<option value="Declined">DECLINE</option>
						</select>
					</article>
					<article>
						<input type="submit" value="SUBMIT" id="sub">
					</article>
					<script>
						$(function() {
							var id = "";
							$(\'#intname\').autocomplete({
								source: function(request, response) {
									$.ajax({
										url: "Human_Resources/Interviews/autocompletename.php",
										dataType: "json",
										data: {
											term : request.term
										},
										success: function(data) {
											response(data);
											id = data[0];
											console.log(id);
										}
									});
								},
								html: true,
								select: function(event,ui){
									$.ajax({
										url: "Human_Resources/Interviews/getdec.php",
										dataType: "json",
										data: {param1: id},
										success: function(data) {
											var first = data[0];
											$("#decision").val(first);
											if (first == "Accepted") {
												$("#status").hide();
												$("#sub").hide();
											} else{
												$("#status").show();
												$("#sub").hide();
											}
										}
									})
									.done(function() {
										console.log("success");
									})
									.fail(function() {
										console.log("error");
									})
									.always(function() {
										console.log("complete");
									});
								}
							});
						});
					</script>
				</form>';
			break;
		case 'new':
			echo '<h1>INTERVIEW</h1>
				<form action="Human_Resources/Interviews/interview.php" method="POST">
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
						<input type="text" name="status" id="status" class="fill" required placeholder="STATUS">
					</section>
					<article>
						<h4>CATEGORY</h4>
						<select id="category" name="category">
							<option value="HR">HUMAN RESOURCES</option>
							<option value="Accounts">ACCOUNTS</option>
							<option value="Employee">EMPLOYEE</option>
						</select>
					</article>
					<article>
						<h4>POST</h4>
						<select id="posttype" name="posttype">
							<option value="HR Manager">MANAGER</option>
							<option value="HR Executive">EXECUTIVE</option>
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
				</form>
				<script>
					$(function() {
						$(\'#interby\').autocomplete({
							source: "Human_Resources/Interviews/ac.php",
							minLength: 2
						});
					});
				</script>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>