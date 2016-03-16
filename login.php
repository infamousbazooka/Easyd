<?php
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	require "C:/xampp/htdocs/easyd/connect.php";
	$sql = "SELECT name, password, empid FROM registration_sftwre";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	if ($row["empid"] == $username) {
	    		if ($row["password"] == $password) {
	    			session_start();
	    			$_SESSION["username"] = $username;
	    			$_SESSION["password"] = $password;
	    			$_SESSION["name"] = $row["name"];
	    			header('Location: dashboard/');
	    		}
	    	}
	    }
	}
	$conn->close();
?>