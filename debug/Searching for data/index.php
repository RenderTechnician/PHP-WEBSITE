<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<form method="post">
	<input type="text" name="Search" placeholder="Search The Database Here" id="Input1">
	<select name="selector">
		<option value="SID">Student ID</option>
		<option value="Name">Name Of Student</option>
		<option value="EMAIL">Student Email</option>
		<option value="Faculty">Student Email</option>
	</select>
	<button type="submit">Validate</button>
	</form>

		<div id="datashow">
		<?php 

			$dsn = 'mysql:host=127.0.0.1;dbname=studentrecord;';
			$user ='root';
			$password = '';
			$x = 1;
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
			if (isset($_POST['selector']) && isset($_POST['Search'])) {
				$searcher 		=	$_POST['Search'];
				$selected		= 	$_POST['selector'];
				$query = "SELECT * FROM records WHERE $selected LIKE '$searcher%'";
				$result = $dbHandler->query($query);
					while ($row = $result->fetch(PDO::FETCH_ASSOC))
					{
					echo "Record : $x<br><br>";
					echo $row['SID']	.	"&nbsp;&nbsp;&nbsp;" . 
						 $row['Name']	.	"&nbsp;&nbsp;&nbsp;" . 
						 $row['EMAIL']	.	"&nbsp;&nbsp;&nbsp;" . 
						 $row['Faculty']	.	"<br><br>";
						 $x++;
					}
			}
				if ($x == 1)
				 {
				echo "No relevant records found! Please broaden your search parameters";
				 }
			?>

		</div>
	<br><br><br><br><br>
<div id="add">
	<form method="post">
	<input type="text" name="Name" placeholder="Name"><br><br>
	<input type="text" name="Email" placeholder="Email"><br><br>
	<input type="text" name="SID" placeholder="SID"><br><br>
	<select name="Faculty">
		<option value="Faculty of Arts, Law and Social Sciences">Faculty of Arts, Law and Social Sciences</option>
		<option value="Lord Ashcroft International Business School ">Lord Ashcroft International Business School </option>
		<option value="Faculty of Health, Social Care & Education">Faculty of Health, Social Care & Education</option>
		<option value="Faculty of Science and Technology">Faculty of Science and Technology</option>
		<option value="Faculty of Medical Science">Faculty of Medical Science</option>
	</select> <br><br>
	<button type="submit">Submit Data</button>
	</form>
		<?php
	//Search The Database

	//Insert Data Into Database
	if (isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['SID']) && isset($_POST['Faculty'])) 
	{
		$sqlQuery = "INSERT INTO records VALUES(?,?,?,?)";
		$query = $dbHandler->prepare($sqlQuery);

		$sid 		= 	$_POST['SID'];
		$name 		= 	$_POST['Name'];
		$email		=	$_POST['Email'];
		$faculty 	=	$_POST['Faculty'];
		//execute the query
		$query->execute(array("$name","$email","$sid","$faculty"));
		echo "<br>Data Entered Succesfully";
	}?>
</div>
</body>
</html>