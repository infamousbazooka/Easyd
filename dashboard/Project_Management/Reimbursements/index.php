<?php
	switch ($_REQUEST["type"]) {
		case 'add':
			echo '<h1>LEAVE APPLICATION</h1>
				<form action="Project_Management/Reimbursements/insert.php" method="POST">
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
						<input class="fill" type="number" id="distance" required placeholder="DISTANCE(km)" name="distance">
						<input class="fill" type="number" id="price" required placeholder="PRICE/KM(Rs.)" name="price">
					</section>
					<section>
						<input class="fill" type="number" id="amount" required placeholder="AMOUNT" name="amount">
						<input class="fill" type="text" id="invoice" required placeholder="INVOICE NO" name="invoice">
					</section>
						<input class="fill" type="text" id="details" required placeholder="DETAILS" name="details">
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		case 'view':
			echo '';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>