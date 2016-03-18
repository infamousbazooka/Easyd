<?php
	switch ($_REQUEST["type"]) {
		case 'new':
			echo ('<div class="title"><h1>NEW REGISTRATION</h1></div>
				<div id="form" class="form">
					<form >
						<input class="fill" type="text" id="fname" required placeholder="FULL NAME" name="name">
						<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="empid">
						<input class="fill" type="password" id="pass" onkeyup="checkPasswordMatch()" required placeholder="PASSWORD" name="pass">
						<input class="fill" type="password" id="rpass" onkeyup="checkPasswordMatch()" required placeholder="RETYPE PASSWORD" name="rpass">
						<article>
							<input type="button" id="ret" disabled="disabled" value="SUBMIT">
							<input type="reset" value="RESET">
						</article>
					</form>
					<div id="display"></div>
				</div>
					<script>
						$(function() {
							$("#ret").click(function(event) {
								file = "Employee_Registration/new.php";
								fname = $("#fname").val();
								empid = $("#empid").val();
								pass = $("#pass").val();
								$("#display").load(file, {"fname":fname, "empid":empid, "pass":pass});
								$("#empid").val("");
								$("#fname").val("");
								$("#pass").val("");
								$("#rpass").val("");
							});
							var id = "";
							$(\'#fname\').autocomplete({
								source: function(request, response) {
									$.ajax({
										url: "Employee_Registration/acname.php",
										dataType: "json",
										data: {
											term : request.term
										},
										success: function(data) {
											response(data);
											id=data[0];
										}
									});
								},
								html: true,
								select: function(event,ui){
									$.ajax({
										url: "Employee_Registration/get.php",
										dataType: "json",
										data: {param1: id},
										success: function(data) {
											$("#empid").val(data);
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
					</script>');
			break;

		case 'change':
			echo ('<div class="title"><h1>CHANGE PASSWORD</h1></div>
				<div id="form" class="form">
					<form>
						<input class="fill" type="text" id="empid" required placeholder="EMPLOYEE ID" name="name">
						<input class="fill" type="password" id="cpass" required placeholder="CURRENT PASSWORD" name="cpass">
						<input class="fill" type="password" id="pass" onkeyup="checkPasswordMatch()" required placeholder="NEW PASSWORD" name="pass">
						<input class="fill" type="password" id="rpass" onkeyup="checkPasswordMatch()" required placeholder="RETYPE NEW PASSWORD" name="rpass">
						<article>
							<input type="button" id="ret" disabled="disabled" value="SUBMIT">
							<input type="reset" value="RESET">
						</article>
					</form>
				</div>
				<h3 id="display"></h3>
				<script>
					$(function() {
						$("#ret").click(function(event) {
							file = "Employee_Registration/change.php";
							empid = $("#empid").val();
							cpass = $("#cpass").val();
							pass = $("#pass").val();
							$("#display").load(file, {"empid":empid, "cpass":cpass, "pass":pass});
							$("#empid").val("");
							$("#cpass").val("");
							$("#pass").val("");
							$("#rpass").val("");
						});
						$(\'#empid\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Employee_Registration/acid.php",
									dataType: "json",
									data: {
										term : request.term
									},
									success: function(data) {
										response(data);
									}
								});
							},
							html: true
						});
					});
				</script>');
			break;
		default:
			echo "nothin";
			break;
	}
	
?>