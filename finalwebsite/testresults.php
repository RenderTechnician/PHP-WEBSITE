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
	<br>
		<div id="creationback">
	<?php
	$x = 1;
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
			session_start();
			$user = $_SESSION['User'];
			$query = "SELECT * FROM testresults WHERE Username = '$user'";
			$result = $dbHandler->query($query);
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				echo "Test Result : ". $x;
				echo "&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "Result Date: " .$row['ResultDate'];
				echo "&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "Result Date: ". $row['TestType'];
				echo "&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "Test Verdict: ". $row['Result'];
				echo "<br><br>";
			$x++;
			}
	 ?>
	</div>
</body>
<footer id="footer"></footer>
</html>