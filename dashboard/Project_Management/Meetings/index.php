<?php
	switch ($_REQUEST["type"]) {
		case 'add':
			echo '<h1>ADD MEETING</h1>
				<form>
					<input class="fill" type="text" id="pname" required placeholder="PROJECT NAME" name="pname">
					<input class="fill" type="text" id="memreq" required placeholder="MEMBERS REQUIRED" name="memreq">
					<h4 id="mem"></h4>
					<input class="fill" type="text" id="agenda" required placeholder="AGENDA" name="agenda">
					<input class="fill" type="text" id="to" required placeholder="DATE" name="mdate">
					<input class="fill" type="time" id="time" required placeholder="TIME" name="time">
					<article>
						<input type="button" id="ret" value="SUBMIT">
						<input type="reset" id="reset" value="RESET">
					</article>
				</form>
				<h4 id="display"></display>
				<script>
					$(function() {
						$(\'#pname\').autocomplete({
							source: "Project_Management/Meetings/acpname.php"
						});
					});
					$("#reset").click(function(event) {
						$("#mem").text("");
					});
					$("#ret").click(function(event) {
						file = "Project_Management/Meetings/insert.php";
						name = $("#pname").val();
						memreq = $("#mem").text();
						memreq = str_replace("SELECTED MEMBERS: ", "", memreq);
						agenda = $("#agenda").val();
						to = $("#to").val();
						time = $("#time").val();
						$("#display").load(file, {"pname":pname, "memreq":memreq, "agenda":agenda, "mdate":to, "time":time});
					});
					var id = "";
					$(\'#memreq\').autocomplete({
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
								$("#memreq").val("");
							}
							else{
								$("#mem").text("SELECTED MEMBERS: " + ui.item.value);
								$("#memreq").val("");
							}
						}
					});
				</script>';
			break;
		case 'view':
				require "C:/xampp/htdocs/easyd/connect.php";
				$sql = "SELECT * FROM meeting_details";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<table class="pure-table pure-table-bordered">
				<tr class="th">
					<th>PROJECT NAME</th>
					<th>MEMBERS REQUIRED</th>
					<th>MEETING AGENDA</th>
					<th>DATE</th>
					<th>TIME</th>
					<th>MEETING MINUTES</th>
					<th>ORGANISED BY</th>
					<th>RECORDED AT</th>
				</tr>';
				    while($row = $result->fetch_assoc()) {
				    	echo '<tr>
					<td>' . $row["project_name"] . '</td>
					<td>' . $row["members"] . '</td>
					<td>' . $row["meet_agenda"] . '</td>
					<td>' . $row["meet_date"] . '</td>
					<td>' . $row["meet_time"] . '</td>
					<td>' . $row["meet_minutes"] . '</td>
					<td>' . $row["meet_convenor"] . '</td>
					<td>' . $row["meet_addtime"] . '</td>
				</tr>';
				    }
				}
				else{
					echo "NO TABLES FOUND";
				}
				echo "</table>";
				$conn->close();
			break;
		default:
			echo "nothin";
			break;
	}
	
?>