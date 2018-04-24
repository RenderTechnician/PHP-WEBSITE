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
			 	$r = $v-1;
			 	//echo "$r";
			 	if (!$row['Quantity Remaining'] == "0") {
			 	$query = "UPDATE prescription SET `Quantity Remaining` ='$r' WHERE ID = '$user$x'";
			 	$result = $dbHandler->query($query);
			 	echo "Your prescription for ".$row['Prescribed Item']." has been approved";}
				
				if ($row['Quantity Remaining'] == "0") {
				echo "You have no renewals remaining. Please visit your doctor to obtain additional renewals";}
?>