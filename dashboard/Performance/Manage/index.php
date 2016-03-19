<?php
	session_start();
	$chk = $_SESSION["username"];
	$name = $_SESSION["name"];
	$chk = preg_replace('/[0-9]+/', '', $chk);

	switch ($_REQUEST["type"]) {
		case 'atten':
			echo '<h1>ATTENDANCE</h1>
				<form action="">
					<h4 class="radio"><label><input type="radio" checked onclick="radioCheck()" id="indiv" name="leavereg" value="indiv"> INDIVIDUAL</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="comp" name="leavereg" value="comp"> COMPANY</label></h4>
					<input type="text" class="fill" name="empname" onkeyup="checkviewindi()" id="empname" required placeholder="EMPLOYEE NAME">
					<article>
						<h4>MONTH</h4>
						<select id="month">
							<option value="Jan">JANUARY</option>
							<option value="Feb">FEBRUARY</option>
							<option value="Mar">MARCH</option>
							<option value="Apr">APRIL</option>
							<option value="May">MAY</option>
							<option value="Jun">JUNE</option>
							<option value="Jul">JULY</option>
							<option value="Aug">AUGUST</option>
							<option value="Sep">SEPTEMBER</option>
							<option value="Oct">OCTOBER</option>
							<option value="Nov">NOVEMBER</option>
							<option value="Dec">DECEMBER</option>
						</select>
					</article>
					<article>
						<h4>YEAR</h4>
						<select id="year">
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>
					</article>
					<article>
						<input type="button" value="VIEW" id="ret">
					</article>
				</form>
				<div id="display"></div>
				<script>
						$(function() {
							$("#ret").click(function(event) {
								file = "http://localhost/easyd/dashboard/Performance/Manage/get.php";
								type = $("input[name=leavereg]:checked").val();
								name = $("#empname").val();
								month = $("#month").val();
								year = $("#year").val();
								if (type == "comp") {
									$("#display").load(file, {"month":month, "year":year});
								}
								else {
									$("#display").load(file, {"name":name, "month":month, "year":year});
								}
							});
							chk = "' . $chk . '";
							name = "' . $name . '";
							if (chk != \'ow\') {
								$("#comp").attr("disabled", "disabled");
								$("#empname").val(name);
								$("#empname").attr("readonly", "readonly");
							}
							if($(this).attr("value")=="indiv"){
								$(".box").show();
								if ($("#empname").val() == "") {
									$("#viewindi").attr("disabled", "disabled");
								}
							}
							if($(this).attr("value")=="comp"){
								$("#empname").val("");
								$("#viewindi").removeAttr("disabled");
								$(".box").hide();
							}
							$(\'input[type="radio"]\').click(function() {
								if($(this).attr("value")=="indiv"){
									$(".box").show();
									if ($("#empname").val() == "") {
										$("#viewindi").attr("disabled", "disabled");
									}
								}
								if($(this).attr("value")=="comp"){
									$("#empname").val("");
									$("#viewindi").removeAttr("disabled");
									$(".box").hide();
								}
							});
							var id = "";
							$(\'#empname\').autocomplete({
								source: function(request, response) {
									$.ajax({
										url: "Performance/Manage/acname.php",
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
					</script>';
			break;
		case 'proj':
			echo '<h1>PROJECT</h1>
				<form action="">
					<h4 class="radio"><label><input type="radio" checked onclick="radioCheck()" id="indiv" name="leavereg" value="indiv"> INDIVIDUAL</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="comp" name="leavereg" value="comp"> COMPANY</label></h4>
					<div class="box">
						<input type="text" class="fill" name="empname" id="empname" required placeholder="EMPLOYEE NAME">
						<input type="text" class="fill" name="clientname" id="clientname" required placeholder="CLIENT NAME">
						<input type="text" class="fill" name="projname" id="projname" required placeholder="PROJECT NAME">
					</div>
					<article>
						<input type="button" onclick="perfproj()" value="VIEW" id="viewindi">
					</article>
				</form>
				<div id="display"></div>
				<script>
					$(function() {
						if ($("#empname").val() == "") {
							$("#viewindi").attr("disabled", "disabled");
						}
						else{
							$("#viewindi").removeAttr("disabled");
						}
						chk = "' . $chk . '";
						name = "' . $name . '";
						if (chk != \'ow\') {
							$("#comp").attr("disabled", "disabled");
							$("#empname").val(name);
							$("#empname").attr("readonly", "readonly");
						}
						$(\'#empname\').autocomplete({
							source: "Performance/Manage/emp.php"
						});
						$(\'#clientname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Performance/Manage/cname.php",
									dataType: "json",
									data: {
										term : request.term,
										empname : $("#empname").val()
									},
									success: function(data) {
										response(data);
									}
								});
							},
							html: true
						});
						$(\'#projname\').autocomplete({
							source: function(request, response) {
								$.ajax({
									url: "Performance/Manage/pname.php",
									dataType: "json",
									data: {
										term : request.term,
										empname : $("#empname").val(),
										clientname : $("#clientname").val()
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