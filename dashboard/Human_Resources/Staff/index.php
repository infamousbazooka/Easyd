<div class="form">
	<h1>STAFF REGISTRATION</h1>
	<form action="Human_Resources/Staff/insert.php" method="POST">
		<section>
			<input class="fill" type="text" id="pname" required placeholder="NAME" name="pname">
			<input class="fill" type="text" id="workacc" required placeholder="EMAIL" name="workacc">
		</section>
		<section>
			<input class="fill" type="number" id="hours" required placeholder="PERMANENT ADDRESS" name="hours">
			<input class="fill" type="text" id="marketing" required placeholder="CONTACT NO" name="marketing">
		</section>
		<section>
			<input class="fill" type="text" id="mwacc" required placeholder="BANK" name="wacc">
		</section>
		<article>
			<h4>CATEGORY</h4>
			<select id="category" onclick="combo()">
				<option value="owner">OWNER</option>
				<option value="hr">HUMAN RESOURCES</option>
				<option value="acc">ACCOUNTS</option>
				<option value="emp">EMPLOYEE</option>
			</select>
		</article>
		<article>
			<h4>POST</h4>
			<select id="posttype">
				<option value="Propreitor">PROPREITOR</option>
			</select>
		</article>
		<input class="fill" type="text" id="dob" required placeholder="DATE OF BIRTH" name="dob">
		<input class="fill" type="text" id="join" required placeholder="JOINING DATE" name="join">
		<article>
			<input type="submit" value="SUBMIT">
			<input type="reset" value="RESET">
		</article>
	</form>
</div>