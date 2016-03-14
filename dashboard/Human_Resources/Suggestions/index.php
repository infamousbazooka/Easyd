<?php
	switch ($_REQUEST["type"]) {
		case 'view':
			echo '';
			break;
		case 'give':
			echo '<h1>GIVE SUGGESTIONS</h1>
				<form action="Human_Resources/Suggestions/suggest.php" method="POST">
					<textarea class="fill" name="compl" id="suggestion" required placeholder="SUGGESTION"></textarea>
					<article>
						<input type="submit" value="SUGGEST">
						<input type="reset" value="RESET">
					</article>
				</form>';
			break;
		default:
			echo "nothin";
			break;
	}
	
?>