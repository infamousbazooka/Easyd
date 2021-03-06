<?php
	switch ($_REQUEST["type"]) {
		case 'add':
			echo '<h1>ADD STOCKS</h1>
				<form>
					<article>
						<h4>CATEGORY</h4>
						<select name="category" id="category">
							<option value="stationery">STATIONERY</option>
							<option value="furniture">FURNITURE</option>
							<option value="electronics">ELECTRONICS</option>
							<option value="miscellaneous">MISCELLANEOUS</option>
						</select>
					</article>
					<input class="fill" type="text" id="name" required placeholder="ITEM NAME" name="name">
					<input class="fill" type="text" id="desc" required placeholder="DESCRIPTION" name="desc">
					<input class="fill" type="number" id="qty" required placeholder="QUANTITY" name="qty">
					<input class="fill" type="number" id="price" required placeholder="PRICE" name="price">
					<input class="fill" type="text" id="to" required placeholder="PURCHASE DATE" name="to">
					<input class="fill" type="text" id="buffer" required placeholder="BUFFER LIMIT" name="buffer">
					<article>
						<input type="button" id="ret" value="SUBMIT">
						<input type="reset" value="CLEAR">
					</article>
					</div>
				</form>
				<h4 id="display"></h4>
				<script>
						$(function() {
							$("#ret").click(function(event) {
								file = "Inventory/Stock/insert.php";
								name = $("#name").val();
								category = $("#category").val();
								desc = $("#desc").val();
								qty = $("#qty").val();
								price = $("#price").val();
								to = $("#to").val();
								buffer = $("#buffer").val();
								$("#display").load(file, {"name":name, "category":category, "desc":desc, "qty":qty, "price":price, "to":to, "buffer":buffer});
								$("#category").val("");
								$("#name").val("");
								$("#desc").val("");
								$("#qty").val("");
								$("#price").val("");
								$("#to").val("");
								$("#buffer").val("");
							});
						})
				</script>';
			break;
		case 'update':
			echo '<h1>UPDATE STOCKS</h1>
				<form>
					<article>
						<h4>CATEGORY</h4>
						<select name="category" id="categ">
							<option value="Stationery">STATIONERY</option>
							<option value="Furniture">FURNITURE</option>
							<option value="Electronics">ELECTRONICS</option>
							<option value="Miscellaneous">MISCELLANEOUS</option>
						</select>
					</article>
					<input class="fill" type="text" id="itemname" required placeholder="ITEM NAME" name="name">
					<h4 id="sitem">SELECTED ITEM: </h4>
					<input class="fill" type="text" id="qty" required placeholder="CURRENT QUANTITY" name="currentqty" >
					<input class="fill" type="text" id="cqty" required placeholder="QUANTITY TO BE CONSUMED" name="cqty">
					<article>
						<input type="button" id="ret" value="SUBMIT">
						<input type="reset" value="CLEAR">
					</article>
					</div>
					<script>
						$(function() {
							$("#ret").click(function(event) {
								file = "Inventory/Stock/update.php";
								item = $("#itemname").val();
								category = $("#categ").val();
								qty = $("#qty").val();
								cqty = $("#cqty").val();
								$("#display").load(file, {"item":item, "category":category, "qty":qty, "cqty":cqty});
								$("#itemname").val("");
								$("#qty").val("");
								$("#cqty").val("");
								$("#sitem").text("");
							});
							$(\'#itemname\').autocomplete({
								source: function(request, response) {
							        $.ajax({
							            url: "Inventory/Stock/autocompletename.php",
							            dataType: "json",
							            data: {
							                term : request.term,
							                category : $("#categ").val()
							            },
							            success: function(data) {
							                response(data);
							            }
							        });
							    },
							    html: true,
							    select: function(event,ui){
							    	event.preventDefault();
							    	$("#qty").val(ui.item.value);
							    	$("#itemname").val(ui.item.label);
							    	$("#sitem").text("SELECTED ITEM: "+ui.item.label);
							    }
							});
						});
					</script>
				</form>
				<h4 id="display"></h4>';
			break;
		case 'view':
			echo '<h1>VIEW PURCHASE HISTORY</h1>
				<form action="" method="POST">
					<h4 class="radio"><label><input type="radio" checked onclick="radioCheck()" id="item" name="leadtype" value="item"> ITEM WISE</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="elead" name="leadtype" value="gen"> GENERAL</label></h4>
					<div class="box" id="stocke">
						<article>
							<h4>ITEM TYPE</h4>
							<select name="category" id="category">
								<option value="Stationery">STATIONERY</option>
								<option value="Furniture">FURNITURE</option>
								<option value="Electronics">ELECTRONICS</option>
								<option value="Miscellaneous">MISCELLANEOUS</option>
							</select>
						</article>
						<input class="fill" type="text" id="name" required placeholder="ITEM NAME" name="name">
					</div>
					<article>
						<input type="button" onclick="getstock()" value="VIEW">
					</article>
					</div>
				</form>
				<div id="display"></div>
				<script>
					$(function() {
						$(\'input[type="radio"]\').click(function() {
							if($(this).attr("value")=="item"){
								$("#stocke").show();
							}
							if($(this).attr("value")=="gen"){
								$("#stocke").hide();
							}
						});
						$(\'#name\').autocomplete({
							source: function(request, response) {
						        $.ajax({
						            url: "Inventory/Stock/acname.php",
						            dataType: "json",
						            data: {
						                term : request.term,
										category : $("#category").val()
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
		case 'history':
			echo '<h1>VIEW CONSUMED HISTORY</h1>
				<form method="POST">
					<h4 class="radio"><label><input type="radio" checked onclick="radioCheck()" id="item" name="leadtype" value="item"> ITEM WISE</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="elead" name="leadtype" value="gen"> GENERAL</label></h4>
					<div class="box" id="stocke">
						<article>
							<h4>ITEM TYPE</h4>
							<select name="category" id="category">
								<option value="stationery">STATIONERY</option>
								<option value="furniture">FURNITURE</option>
								<option value="electronics">ELECTRONICS</option>
								<option value="miscellaneous">MISCELLANEOUS</option>
							</select>
						</article>
						<input class="fill" type="text" id="name" required placeholder="ITEM NAME" name="name">
					</div>
					<article>
						<input type="button" onclick="gethistory()" value="VIEW">
					</article>
					</div>
				</form>
				<div id="display"></div>
				<script>
					$(function() {
						$(\'input[type="radio"]\').click(function() {
							if($(this).attr("value")=="item"){
								$("#stocke").show();
							}
							if($(this).attr("value")=="gen"){
								$("#stocke").hide();
							}
						});
						$(\'#name\').autocomplete({
							source: function(request, response) {
						        $.ajax({
						            url: "Inventory/Stock/accname.php",
						            dataType: "json",
						            data: {
						                term : request.term,
										category : $("#category").val()
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