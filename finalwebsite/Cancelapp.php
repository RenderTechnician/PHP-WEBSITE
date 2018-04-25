<?php
session_start();
$x = $_GET['id'] - 1;
$time = date('H:i:s', strtotime( "8:00:00.  + "	.	$x * 20	.	" minutes"));
			//SQL Connection
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
			$cuser = $_SESSION['User'];
			$query = "SELECT * FROM appointments WHERE Person = '$cuser' ORDER BY `Date`, `Time`";
			$result = $dbHandler->query($query);
			$row = $result->fetchall(PDO::FETCH_ASSOC);
			var_dump($row[0]['Date']);
			$query = "DELETE "
?>