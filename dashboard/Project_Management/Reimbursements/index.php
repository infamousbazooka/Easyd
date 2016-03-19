<?php
	switch ($_REQUEST["type"]) {
		case 'add':
			echo '<h1>ADD REIMBURSEMENTS</h1>
				<form>
					<section>
						<input class="fill" type="text" id="periodfrom" required placeholder="PERIOD FROM" name="periodfrom">
						<input class="fill" type="text" id="periodto" required placeholder="PERIOD TO" name="periodto">
					</section>
					<article>
						<h4>EXPENSE TYPE</h4>
						<select name="bill" id="category" onclick="combo()">
							<option value="Client">CLIENT BILLING</option>
							<option value="Office">OFFICE BILLING</option>
						</select>
					</article>
					<article>
						<h4>EXPENSE NATURE</h4>
						<select name="nature" id="posttype">
							<option value="Transport">TRANSPORT</option>
							<option value="Phone_calls">PHONE CALLS</option>
							<option value="Others">OTHERS</option>
						</select>
					</article>
					<section>
						<input class="fill" type="text" id="mode" required placeholder="MODE" name="mode">
						<input class="fill" type="number" id="days" required placeholder="DAYS" name="days">
					</section>
					<section>
						<input class="fill" type="number" id="distance" onkeyup="amnt()" required placeholder="DISTANCE(km)" name="distance">
						<input class="fill" type="number" id="price" onkeyup="amnt()" required placeholder="PRICE/KM(Rs.)" name="price">
					</section>
					<section>
						<input class="fill" type="number" id="amount" required placeholder="AMOUNT" name="amount">
						<input class="fill" type="text" id="invoice" required placeholder="INVOICE NO" name="invoice">
					</section>
						<input class="fill" type="text" id="details" required placeholder="DETAILS" name="details">
					<article>
						<input type="button" id="ret" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>
				<h4 id="display"></h4>
				<script>
					function amnt(){
						amt = Number($("#distance").val()) * Number($("#price").val());
						$("#amount").val(amt);
					}
						$(function() {
							$("#ret").click(function(event) {
								file = "Project_Management/Reimbursements/insert.php";
								periodfrom = $("#periodfrom").val();
								periodto = $("#periodto").val();
								category = $("#category").val();
								posttype = $("#posttype").val();
								mode = $("#mode").val();
								days = $("#days").val();
								distance = $("#distance").val();
								price = $("#price").val();
								amount = $("#amount").val();
								invoice = $("#invoice").val();
								details = $("#details").val();

								$("#display").load(file, {"periodfrom":periodfrom, "periodto":periodto, "bill":category, "nature":posttype, "mode":mode,
									"days":days, "distance":distance, "price":price, "amount":amount, "invoice":invoice, "details":details});
								$("#periodto").val("");
								$("#periodfrom").val("");
							});
						})
				</script>';
			break;
		case 'view':
			session_start();
			$username = $_SESSION["username"];
			$chk = preg_replace('/[0-9]+/', '', $username);
			$name = $_SESSION["name"];
				require "C:/xampp/htdocs/easyd/connect.php";
				if ($chk=="ow") {
					$sql = "SELECT * FROM reimburse_expenses";
				}
				else{
					$sql = "SELECT * FROM reimburse_expenses WHERE empname='" . $name . "'";
				}
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<table class="pure-table pure-table-bordered">
						<tr class="th">
							<th>ID</th>
							<th>EMPNAME</th>
							<th>FROM</th>
							<th>TO</th>
							<th>EXPENSE TYPE</th>
							<th>EXPENSE NATURE</th>
							<th>MODE</th>
							<th>DAYS</th>
							<th>DISTANCE</th>
							<th>PRICE</th>
							<th>AMOUNT</th>
							<th>INVOICE NO</th>
							<th>DETAILS</th>
						</tr>';
				    while($row = $result->fetch_assoc()) {
						echo '<tr>
							<td>' . $row["id"] . '</td>
							<td>' . $row["empname"] . '</td>
							<td>' . $row["date_from"] . '</td>
							<td>' . $row["date_to"] . '</td>
							<td>' . $row["expense_type"] . '</td>
							<td>' . $row["expense_nature"] . '</td>
							<td>' . $row["mode"] . '</td>
							<td>' . $row["days"] . '</td>
							<td>' . $row["distance"] . '</td>
							<td>' . $row["price"] . '</td>
							<td>' . $row["amount"] . '</td>
							<td>' . $row["invoice_no"] . '</td>
							<td>' . $row["details"] . '</td>
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
		default:
			echo "nothin";
			break;
	}
	
?>