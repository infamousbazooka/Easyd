<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="icon.png" sizes="16x16" type="image/png">
	<meta name="author" content="Magnus Fernandes - AmberZile">
	<meta name="description" content="EasyD for Svastek">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>EasyD | Home</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="mainwrapper">
		<section class="head">
			<div class="logo">
				<img src="images/logo.png" alt="Logo Here" class="img-responsive">
			</div>
		</section>
		<section class="login">
			<h1>Login</h1>
			<form action="login.php">
				<input class="fill" type="text" required placeholder="Username" name="username" id="username">
				<input class="fill" type="password" required placeholder="Password" name="password" id="password">
				<article>
					<input type="submit" value="SUBMIT">
					<input type="reset" value="RESET" id="reset">
				</article>
			</form>
		</section>
		<section class="footer">
			<p>Footer text here.</p>
		</section>
	</div>
<script src="js/lib/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>