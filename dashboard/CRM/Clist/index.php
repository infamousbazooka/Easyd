<?php
	switch ($_REQUEST["type"]) {
		case 'viewclient':
			$sector = array();
			require "C:/xampp/htdocs/easyd/connect.php";
			$sql = "SELECT DISTINCT sector FROM clients";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	array_push($sector, $row["sector"]);
			    }
			}
			else{
				die("ERROR");
			}
			$conn->close();
			echo '<h1>VIEW CLIENT</h1>
				<form action="">
					<h4 class="radio"><label><input type="radio" checked onclick="radioCheck()" id="sector" name="vclient" value="sector"> BASED ON SECTOR</label></h4>
					<h4 class="radio"><label><input type="radio" onclick="radioCheck()" id="general" name="vclient" value="general"> GENERAL</label></h4>
					<select id="sectortype" name="sector">
						';
			for ($i=0; $i < sizeof($sector); $i++) { 
				echo '<option value="' . $sector[$i] . '">' . $sector[$i] . '</option>';
			}
			echo '</select>
					<article>
						<input type="button" onclick="viewclient()" value="VIEW">
					</article>
				</form>
				<div id="display"></div>';
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