<h1>ALLOCATE TASKS</h1>
<form>
	<input class="fill" type="text" id="fname" required placeholder="FIRM NAME" name="fname">
	<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
	<input class="fill" type="text" id="empname" required placeholder="EMPLOYEE NAME" name="empname">
	<input class="fill" type="text" id="address" required placeholder="ADDRESS" name="address">
	<textarea class="fill" id="task" required placeholder="TASK" name="task"></textarea>
	<input class="fill" type="text" id="start" required placeholder="START DATE" name="start">
	<input class="fill" type="text" id="end" required placeholder="END DATE" name="end">
	<input class="fill" type="time" id="time" required placeholder="END TIME" name="time">
	<article>
		<input type="button" id="ret" value="SUBMIT">
		<input type="reset" id="reset" value="RESET">
	</article>
</form>
<h4 id="disp"></display>
<script>
	$( "#start" ).datepicker();
	$( "#end" ).datepicker();
	$(function() {
		$("#ret").click(function(event) {
			file = "Project_Management/On_Project/Tasks/insert.php";
			fname = $("#fname").val();
			pname = $("#pname").val();
			empname = $("#empname").val();
			address = $("#address").val();
			task = $("#task").val();
			start = $("#start").val();
			end = $("#end").val();
			time = $("#time").val();
			$("#disp").load(file, {"fname":fname, "pname":pname, "empname":empname, "address":address, "task":task, "start":start, "end":end, "time":time});
			$("#fname").val("");
			$("#pname").val("");
			$("#empname").val("");
			$("#address").val("");
			$("#task").val("");
			$("#start").val("");
			$("#end").val("");
			$("#time").val("");
		});
		var id = "";
		var param = "";
		$('#empname').autocomplete({
			source: "Human_Resources/Incentives/autocompletename.php",
			minLength: 2
		});
		$('#fname').autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "Project_Management/On_Project/Tasks/acfname.php",
					dataType: "json",
					data: {
						term : request.term
					},
					success: function(data) {
						response(data);
						param=data[0];
					}
				});
			},
			html: true
		});
		$('#pname').autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "Project_Management/On_Project/Tasks/acpname.php",
					dataType: "json",
					data: {
						term : request.term,
						param : $('#fname').val()
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
					url: "Project_Management/On_Project/Tasks/get.php",
					dataType: "json",
					data: { param2:param},
					success: function(data) {
						console.log(data)
						$("#address").val(data);
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