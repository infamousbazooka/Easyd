<?php
	switch ($_REQUEST["type"]) {
		case 'nlead':
			echo '<h1>NEW LEAD</h1>
				<form>
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
						<input class="fill" type="text" id="proname" required placeholder="PROJECT NAME" name="proj_associated">
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
						<input type="button" id="ret" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>
				<h4 id="display"></h4>
				<script>
						$(function() {
							$(\'input[type="radio"]\').click(function(){
								if($(this).attr("value")=="new"){
									$("#email").removeAttr("disabled");
									$("#address").removeAttr("disabled");
									$("#phone").removeAttr("disabled");
									$("#designation").removeAttr("disabled");
									$("#sector").removeAttr("disabled");
									$(\'#fname\').autocomplete("destroy");
								}
								if($(this).attr("value")=="past"){
									$("#email").attr("disabled", "disabled");
									$("#address").attr("disabled", "disabled");
									$("#phone").attr("disabled", "disabled");
									$("#designation").attr("disabled", "disabled");
									$("#sector").attr("disabled", "disabled");
									$(\'#fname\').autocomplete({
										source: function(request, response) {
									        $.ajax({
									            url: "CRM/Flist/acfname.php",
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
								}
							});
							$("#ret").click(function(event) {
								file = "CRM/Flist/insert.php";
								type = $(\'input[name=leadtype]:checked\').val();
								fname = $("#fname").val();
								pname = $("#pname").val();
								email = $("#email").val();
								address = $("#address").val();
								phone = $("#phone").val();
								proname = $("#proname").val();
								sector = $("#sector").val();
								designation = $("#designation").val();
								followreason = $("#followreason").val();
								followreply = $("#followreply").val();
								$("#display").load(file, {"type":type, "fname":fname, "pname":pname, "email":email,
									"address":address, "phone":phone, "proname":proname, "sector":sector, "designation":designation,
									"followreason":followreason, "followreply":followreply});
								$("#fname").val("");
								$("#pname").val("");
								$("#email").val("");
								$("#address").val("");
								$("#phone").val("");
								$("#proname").val("");
								$("#sector").val("");
								$("#designation").val("");
								$("#followreason").val("");
								$("#followreply").val("");
							});
						})
				</script>';
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
							<input type="submit" id="ret" value="SUBMIT">
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