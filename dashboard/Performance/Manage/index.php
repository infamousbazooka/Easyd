<?php
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
						<input type="button" onclick="perfatten()" disabled="disabled" value="VIEW" id="viewindi">
					</article>
				</form>
				<div id="display"></div>
				<script>
						$(function() {
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
						<input type="text" class="fill" name="empname" onkeyup="checkviewindi()" id="empname" required placeholder="EMPLOYEE NAME">
						<input type="text" class="fill" name="clientname" id="clientname" required placeholder="CLIENT NAME">
						<input type="text" class="fill" name="projname" id="projname" required placeholder="PROJECT NAME">
					</div>
					<article>
						<input type="button" onclick="perfproj()" disabled="disabled" value="VIEW" id="viewindi">
					</article>
				</form>
				<div id="display"></div>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>