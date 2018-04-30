<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
	<script type="text/javascript" src="Cancel.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
	</header>
</head>
<body>
	<div id="creationback">
			<form method="post">
	<input type="textbox" name="Search" placeholder="Type in me and i'll search the database" id="input3">	
	<br><select name= "Selector" id="input3">
		<option value="Person">Person</option>
		<option value="Date">Date</option>
		<option value="Time">Time</option>
		<option value="DRNS">DRNS</option>
	</select><br><br>
	<input type="submit" value="Validate Query" id="input3">
	</form>
	</div>
			<?php 
			session_start();
			if ($_SESSION['Priv'] == "visitor") {
			header('Location: userpage.php');
			}
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			$x = 1;
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
			if (isset($_POST['Selector']) && isset($_POST['Search'])) {
				$searcher 		=	$_POST['Search'];
				$selected		= 	$_POST['Selector'];
				$query = "SELECT * FROM appointments WHERE $selected LIKE '$searcher%'";
				$result = $dbHandler->query($query);
					while ($row = $result->fetch(PDO::FETCH_ASSOC))
					{
						if($x < 50){
						$q = $x-1;
					echo "Record : $x<br><br>";
					echo $row['Person']	.	"&nbsp;&nbsp;&nbsp;" . 
						 $row['Date']	.	"&nbsp;&nbsp;&nbsp;" . 
						 $row['Time']	.	"&nbsp;&nbsp;&nbsp;" . 
						 $row['DRNS']	.	"<br><br>".
						 "<input type = 'submit' class = 'button' onclick='javascript:cancel".$x."(); 	' value = 'Cancel Appointment'></input><br>";
						 $_SESSION['Super'] = $row['Person'];
						 $x++;
						}
						var_dump($_SESSION['Super']);
					}
			}
				if ($x == 1)
				 {
				echo "No relevant records found! Please broaden your search parameters";
				 }
			?>
</body>
<footer id="footer"></footer>
</html>