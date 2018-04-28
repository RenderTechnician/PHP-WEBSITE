<?php
session_start();
$timestamp = $_SESSION['timestore'];
$DRN = $_SESSION['DON'];
$x = $_GET['id'] - 1;
$time = date('H:i:s', strtotime( "8:00:00.  + "	.	$x * 20	.	" minutes"));
			//SQL Connection
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
			if(!isset($_SESSION['Super'])){
			$user = $_SESSION['User'];
			var_dump("not working");
			}
			if(isset($_SESSION['Super'])){
			$user = $_SESSION['Super'];
			var_dump("working");
			}
			$sqlQuery = "INSERT INTO appointments VALUES(?,?,?,?)";
			$query = $dbHandler->prepare($sqlQuery);
			//execute the query
			$query->execute(array("$user","$timestamp","$time","$DRN"));
			echo "Appointment Succesfully Boooked";
?>