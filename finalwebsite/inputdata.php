<?php
session_start();
$x = $_GET['id'];
//Database connection
	$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
				$user = $_SESSION['User'];
			 	$query = "SELECT * FROM prescription WHERE ID = '$user$x'";
			 	$result = $dbHandler->query($query);
			 	$row = $result->fetch(PDO::FETCH_ASSOC);
			 	$v = $row['Quantity Remaining'];
			 	echo "$v"-1;
?>