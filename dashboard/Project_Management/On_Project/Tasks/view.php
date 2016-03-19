<h1>VIEW TASKS</h1>
<form>
	<input class="fill" type="text" id="frname" required placeholder="FIRM NAME" name="frname">
	<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
	<textarea class="fill" id="task" required placeholder="TASK" name="task"></textarea>
	<textarea class="fill" id="reply" required placeholder="REPLY" name="reply"></textarea>
	<article>
		<input type="button" id="ret" value="SUBMIT">
		<input type="reset" id="reset" value="RESET">
	</article>
</form>
<h4 id="disp"></display>
<script>
	$(function() {
		$("#ret").click(function(event) {
			file = "Project_Management/On_Project/Tasks/update.php";
			var reply = $("#reply").val();
			var frname = $("#frname").val();
			var task = $("#task").val();
			var pname = $("#pname").val();
			$("#disp").load(file, {"reply":reply, "frname":frname, "task":task, "pname":pname});
		});
		var id = "";
		var param = "";
		$('#frname').autocomplete({
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
						param : $('#frname').val()
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
					url: "Project_Management/On_Project/Tasks/gettask.php",
					dataType: "json",
					data: {val:id, param:param},
					success: function(data) {
						console.log(data)
						$("#task").val(data);
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