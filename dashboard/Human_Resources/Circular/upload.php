<?php
	$target_dir = "C:/xampp/htdocs/easyd/document/circular/";
	$target_file = $quatarget = $target_dir . basename($_FILES["cirfile"]["name"]);
	$uploadOk = 1;
	$docFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	if ($_FILES["cirfile"]["size"] > 1000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	if($docFileType != "docx" && $docFileType != "txt") {
	    echo "Sorry, only docx & txt files are allowed.";
	    $uploadOk = 0;
	}
	if ($uploadOk == 0) {
	    die("Sorry, your file was not uploaded.");
	} else {
	    $flag=1;
	}




	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$from = $_POST["from"];
	$to = $_POST["to"];
	$reason = $_POST["reason"];

	require "C:/xampp/htdocs/easyd/connect.php";
	$sql = "INSERT into circular (title, link)
	VALUES ('" . $username . "', '" . $target_file . "')";

	if ($conn->query($sql) === TRUE) {
		if ($flag == 1) {
			if (move_uploaded_file($_FILES["cirfile"]["tmp_name"], $target_file)) {
				    header('Location: ../../');
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>