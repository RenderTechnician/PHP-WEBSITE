<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
	<script type="text/javascript" src="userctrl.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
	</header>
</head>
<body>
	<div id="creationback">
	<?php 
	$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
				$x = 1;
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}?>
				<br>
				<!-- Controls the top name display, selects the first & last name from database majorvalue based on the login username -->
				<?php session_start(); 
				$user = $_SESSION['User'];
			 	$query = "SELECT * FROM prescription WHERE Username = '$user'";
			 	$result = $dbHandler->query($query);
			 	while ($row = $result->fetch(PDO::FETCH_ASSOC))
					{
						echo "Item $x: ";
			 	echo $row['Prescribed Item'].'<br>'. " Renewals Remaining: ". $row['Quantity Remaining']; 
						 echo'<br>';
						 echo '<br><input type ="submit" onclick="javascript:debug'.$x.'();"
						 class = "button" name="button" value ="Renew Prescription"></input>'.'<br><hr id ="bookline"><br>';
						 if ($x > 0) {
						 $query = "SELECT * FROM prescription WHERE ID = '$user$x'";
						 $data = $dbHandler->query($query);
						 $row = $data->fetch();
						 $quantity = $row['Quantity Remaining'];
						 var_dump($quantity);
						 }
						$x++;
					}
			 	?>
			 </div>
</body>
<footer id="footer"></footer>
</html>