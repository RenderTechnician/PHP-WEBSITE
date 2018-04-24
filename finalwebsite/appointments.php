<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
	</header>
</head>
<body>
	<div id="creationback">
	<?php
	session_start();
	$x = 1;
			$cuser = $_SESSION['User'];
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
			$query = "SELECT * FROM appointments WHERE Person = '$cuser'";
			$result = $dbHandler->query($query);
				while ($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					$q = $x;
				echo "<br>Doctor/Nurse: ". $row['DRNS']."&nbsp;&nbsp;&nbsp;&nbsp;". "Date: ".substr($row['Date'],0,10)."&nbsp;&nbsp;&nbsp;&nbsp;"."Time:".$row['Time'];
				echo "&nbsp;&nbsp;&nbsp;&nbsp;"."<input type = 'submit' class = 'button' onclick='javascript:booking".$q."();' value = 'Cancel Appointment'></input><br>";
				echo "<br><hr id ='bookline'><br>";
				$x++;
				}

			?>
		</div>
</body>
<footer id="footer"></footer>
</html>