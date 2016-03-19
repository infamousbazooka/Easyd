<?php
	switch ($_REQUEST["type"]) {
		case 'initiate':
			echo '<h1>PROJECT DETAILS</h1>
				<form action="Project_Management/On_Project/initiate.php" method="POST">
					<article>
						<input class="fill" type="text" id="firmname" required placeholder="FIRM NAME" name="firmname">
						<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="projectname">
					</article>
					<article>
						<input class="fill" type="text" id="leader" required placeholder="TEAM LEADER" name="leader">
						<input class="fill" type="text" id="members" required placeholder="MEMBERS" name="members">
					</article>
					<h4 id="mem"></h4>
					<textarea class="fill" id="desc" name="description" required placeholder="PROJECT DESCRIPTION"></textarea>
					<article>
						<input class="fill" type="text" id="start" required placeholder="START DATE" name="start">
						<input class="fill" type="text" id="end" required placeholder="END DATE" name="end">
					</article>
					<article>
						<input type="button" id="ret" value="SUBMIT">
						<input type="reset" id="reset" value="RESET">
					</article>
				</form>
				<h4 id="display"></h4>
				<script>
					$(function() {
						$("#reset").click(function(event) {
							$("#mem").text("");
						});
						$(\'#firmname\').autocomplete({
							source: "Project_Management/On_Project/acfname.php"
						});
						$(\'#leader\').autocomplete({
							source: "Project_Management/On_Project/acname.php"
						});
						$("#ret").click(function(event) {
							file = "Project_Management/On_Project/initiate.php";
							firmname = $("#firmname").val();
							projectname = $("#projectname").val();
							leader = $("#leader").val();
							members = $("#mem").text();
							members = str_replace("SELECTED MEMBERS: ", "", members);
							desc = $("#desc").val();
							start = $("#start").val();
							end = $("#end").val();
							$("#display").load(file, {"firmname":firmname, "projectname":projectname, "leader":leader, "members":members, "description":desc, "start":start, "end":end});
						});
						$(\'#members\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Project_Management/Meetings/acmem.php",
									dataType: "json",
									data: {
										term : request.term
									},
									success: function(data) {
										response(data);
									}
								});
							},
							html: true,
							select: function(event,ui){
								val = $("#mem").text();
								if (val != "") {
									$("#mem").text(val + ", " + ui.item.value);
									$("#members").val("");
								}
								else{
									$("#mem").text("SELECTED MEMBERS: " + ui.item.value);
									$("#members").val("");
								}
							}
						});
					});
				</script>';
			break;
		case 'clientdetails':
			echo '<h1>CLIENT DETAILS</h1>
				<form action="Project_Management/On_Project/initiate.php" method="POST">
					<input class="fill" type="text" id="name" required placeholder="CLIENT NAME" name="name">
					<input class="fill" type="text" id="designation" required placeholder="DESIGNATION" name="designation">
					<input class="fill" type="tel" id="contact" required placeholder="CONTACT" name="contact">
					<input class="fill" type="email" id="email" required placeholder="EMAIL" name="email">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>
				<script>
					$(function() {
						$(\'#name\').autocomplete({
							source: "Project_Management/On_Project/acfname.php"
						});
					});
				</script>';
			break;
		case 'tasks':
			echo '<h1>TASKS</h1>
				<form action="Project_Management/On_Project/initiate.php" method="POST">
					<article>
						<input type="button" value="ALLOCATE TASKS" id="allocatetasks">
						<input type="button" value="VIEW TASKS" id="viewtasks">
					</article>
				</form>';
			break;
		case 'viewproject':
			echo '<h1>VIEW PROJECTS</h1>
				<form>
					<article>
						<input type="button" onclick="viewsummary()" value="PROJECT SUMMARY" id="summary">
						<input type="button" onclick="kfndkndkfn()" value="PROJECT DETAILS" id="details">
					</article>
					<input class="fill" type="text" id="firmname" required placeholder="FIRM NAME" name="firmname">
					<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="projectname">
					<input class="fill" type="text" id="teamleader" required placeholder="TEAM LEADER" name="teamleader">
					<input class="fill" type="text" id="description" required placeholder="PROJECT DESCRIPTION" name="description">
					<input class="fill" type="text" id="pstart" required placeholder="START" name="pstart">
					<input class="fill" type="text" id="pend" required placeholder="END" name="pend">
				</form>
				<div id="display"></div>
				<script>
					function viewsummary() {
						file = "http://localhost/easyd/dashboard/Project_Management/On_Project/summ.php";
						$("#display").load(file);
					}
					function kfndkndkfn() {
						file = "http://localhost/easyd/dashboard/Project_Management/On_Project/detail.php";
						fname = $("#firmname").val();
						pname = $("#projectname").val();
						$("#display").load(file, {
							"fname" : fname, 
							"pname" : pname
						});
					}
					$(function() {
						$(\'#firmname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Project_Management/On_Project/acfname.php",
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
						var id = "";
						$(\'#projectname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Project_Management/On_Project/acpname.php",
									dataType: "json",
									data: {
										term : request.term,
										param : $("#firmname").val()
									},
									success: function(data) {
										response(data);
										id = data[0];
									}
								});
							},
							html: true,
							select: function(event,ui){
								$.ajax({
									url: "Project_Management/On_Project/get.php",
									dataType: "json",
									data: {
										param : id,
										val : $("#firmname").val()
									},
									success: function(data) {
										console.log(JSON.stringify(data));
										var first = data[0];
										$("#teamleader").val(first.leader);
										$("#description").val(first.pdescription);
										$("#pstart").val(first.pstartdate);
										$("#pend").val(first.penddate);
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
				</script>';
			break;
		case 'addmembers':
			echo '<h1>ADD MEMBERS</h1>
				<form action="Project_Management/On_Project/mem.php" method="POST">
					<input class="fill" type="text" id="fname" required placeholder="FIRM NAME" name="fname">
					<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
					<input class="fill" type="tel" id="member" required placeholder="MEMBERS" name="member">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>
				<script>
					$(function() {
						$(\'#fname\').autocomplete({
							source: "Project_Management/On_Project/acfname.php"
						});
						$(\'#member\').autocomplete({
							source: "Project_Management/On_Project/acname.php"
						});
						$(\'#pname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Project_Management/On_Project/acpname.php",
									dataType: "json",
									data: {
										term : request.term,
										param : $("#fname").val()

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