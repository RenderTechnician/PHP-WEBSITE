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
			$r = $row[$x]['Date'];
			$t = $row[$x]['Time'];
			$d = $row[$x]['DRNS'];
			var_dump($r . $t . $d);
			$query = "DELETE FROM appointments WHERE `Date` = '$r' AND `Time` = '$t' AND DRNS ='$d'";
			$result = $dbHandler->query($query);
?>