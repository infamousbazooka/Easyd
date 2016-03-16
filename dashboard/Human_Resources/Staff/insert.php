<?php
	session_start();
	$username = $_SESSION["username"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}

	$name = $_POST["name"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$contact = $_POST["contact"];
	$bank = $_POST["bank"];
	$post = $_POST["posttype"];
	$dob = $_POST["dob"];
	$join = $_POST["join"];
	
	$target_dire = "C:/xampp/htdocs/easyd/document/cv/";
	$target_filee = $cvtarget = $target_dire . basename($_FILES["cvfile"]["name"]);
	$uploadOke = 1;
	$docFileType = pathinfo($target_filee,PATHINFO_EXTENSION);
	if (file_exists($target_filee)) {
	    echo "Sorry, file already exists.";
	    $uploadOke = 0;
	}
	if ($_FILES["cvfile"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOke = 0;
	}
	if($docFileType != "docx") {
	    echo "Sorry, only docx & txt files are allowed.";
	    $uploadOke = 0;
	}
	if ($uploadOke == 0) {
	    die("Sorry, your file was not uploaded.");
	} else {
	    $flage = 1;
	}

	$target_dir = "C:/xampp/htdocs/easyd/document/qualification/";
	$target_file = $quatarget = $target_dir . basename($_FILES["quafile"]["name"]);
	$uploadOk = 1;
	$docFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	if ($_FILES["quafile"]["size"] > 1000000) {
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

	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');
	$today = date('Y-m-d');
	$time = date('H:i:s');

	$file1 = "C:/xampp/htdocs/easyd/document/qualification/".$email.".docx";
	$file2 = "C:/xampp/htdocs/easyd/document/cv/".$email.".docx";

	$sql = "INSERT into employee_detail (empid, name, email_id, category, address, join_date, contact, time1, dob, bank, docs, cv_path)
	VALUES ('" . $username . "', '" . $name . "', '" . $email . "', '" . $post . "', '" . $address . "', '" . $today . "', '" . $contact . "', '" . $time . "', '" . $dob . "', '" . $bank . "', '" . $fil1 . "', '" . $file2 . "')";

	if ($conn->query($sql) === TRUE) {
		if ($flage==1) {
			if (move_uploaded_file($_FILES["cvfile"]["tmp_name"], "C:/xampp/htdocs/easyd/document/cv/".$email.".docx")) {
					    echo "The file ". basename( $_FILES["cvfile"]["name"]). " has been uploaded.";
					} else {
					    echo "Sorry, there was an error uploading your file.";
					}
		}


		if ($flag==1) {
			if (move_uploaded_file($_FILES["quafile"]["tmp_name"], "C:/xampp/htdocs/easyd/document/qualification/".$email.".docx")) {
				        echo "The file ". basename( $_FILES["quafile"]["name"]). " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				    
	    header('Location: ../../');
		}
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>