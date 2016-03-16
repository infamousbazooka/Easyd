<?php
	session_start();
	$username = $_SESSION["username"];
	$name = $_SESSION["name"];

	if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		header('Location: ../../');
	}
	require "C:/xampp/htdocs/easyd/connect.php";
	date_default_timezone_set('Asia/Calcutta');

	$sql = "SELECT pid,outtime,date1 FROM attd_register WHERE empid='" . $username . "' AND empname='" . $name . "' ORDER BY pid DESC LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id = $row["pid"];
			$outtime = $row["outtime"];
			$check = $row["date1"];
		}
	}
	$today = date('Y:m:d');
	$now = date('H:i:s');
	$hour = date('H');
	$min = date('i');
	if ($outtime == 0) {
		if ($today != $check) {
			$flag = 1;
			$sql = "INSERT into attd_register (empid, empname, intime, inhr, date1, inmin, outtime)
			VALUES ('" . $username . "', '" . $name . "', '" . $now . "', '" . $hour . "', '" . $today . "', '" . $min . "', '0')";
		}else{
			$flag = 0;
			$sql = "UPDATE attd_register SET outtime='" . $now . "', outhr='" . $hour . "', outmin='" . $min . "' WHERE pid='" . $id . "'";
		}
	} else{
		if ($today != $check) {
			$flag = 1;
			$sql = "INSERT into attd_register (empid, empname, intime, inhr, date1, inmin, outtime)
			VALUES ('" . $username . "', '" . $name . "', '" . $now . "', '" . $hour . "', '" . $today . "', '" . $min . "', '0')";
		}else{
			die("<h1>YOUR ATTENDANCE WAS RECORDED</h1>");
		}
	}
	if ($conn->query($sql) === TRUE) {
		if ($flag == 1) {
			echo "<h1>YOUR ATTENDANCE HAS BEEN RECORDED</h1>";
		}else{
			echo "<h1>YOUR ATTENDANCE HAS BEEN UPDATED</h1>";
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>