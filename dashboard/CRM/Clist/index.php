<?php
	switch ($_REQUEST["type"]) {
		case 'viewclient':
			echo '<h1>VIEW CLIENT</h1>
				<form action="CRM/Clist/view.php" method="POST">
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="sector" name="vclient" value="sector"> BASED ON SECTOR</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="general" name="vclient" value="general"> GENERAL</label></h4>
					<select id="sectortype">
						<option value="volvo">Volvo</option>
						<option value="saab">Saab</option>
						<option value="mercedes">Mercedes</option>
						<option value="audi">Audi</option>
					</select>
					<article>
						<input type="submit" value="VIEW">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		
		case 'newclient':
			echo '<h1>NEW CLIENT</h1>
				<form action="CRM/Clist/insert.php" method="POST">
					<section>
						<input class="fill" type="text" id="cname" required placeholder="CLIENT NAME" name="name">
						<input class="fill" type="text" id="fname" required placeholder="FIRM NAME" name="firm_name">
					</section>
					<section>
						<input class="fill" type="email" id="email" required placeholder="EMAIL" name="email">
						<textarea class="fill" id="address" required placeholder="ADDRESS" name="address"></textarea>
					</section>
					<section>
						<input class="fill" type="tel" id="phone" required placeholder="PHONE NUMBER" name="contact">
						<input class="fill" type="text" id="projectname" required placeholder="PROJECT NAME" name="proj_associated">
					</section>
					<section>
						<input class="fill" type="text" id="service" required placeholder="SERVICE PROVIDED" name="service">
						<input class="fill" type="text" id="remarks" required placeholder="REMARKS" name="comments">
					</section>
					<section>
						<input class="fill" type="text" id="sector" required placeholder="SECTOR" name="sector">
						<input class="fill" type="text" id="designation" required placeholder="DESIGNATION" name="desig">
					</section>
					<article>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>