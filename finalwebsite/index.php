<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	session_unset();
	?>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
		<div id="loginmain">
			<form method="post">
		<input type="Username" name="Login" placeholder="Username" >
<input type="Password" name="Passwd" placeholder="Password">
<a href = "userpage.php"><button type="submit">Login</button></a>
</form>
<p>Don't have an account with us? Click <a href="createacc.php">here</a> to sign up</p>
</div>
	</header>
</head>
<body>
	<br>
	<div id="opening" class="opening">
		<h1>&nbsp;Opening Times <br></h1>
		<p id="dates">&nbsp;&nbsp;Monday 7am - 6pm
			<br><br> Tuesday 8am - 6pm
			<br><br> Wednesday 7am - 6pm
			<br><br> Thursday 8am - 6pm
			<br><br> Friday 8am - 6pm
			<br><br> Saturday Closed
			<br><br>Sunday Closed
		</p></div>
	<div id="maps">
		<iframe width="100%" height="500" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=1%20Drings%20Cl%2C%20Over%2C%20Cambridge%20CB24%205NZ+(Over%20Surgery)&amp;ie=UTF8&amp;t=h&amp;z=19&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
		<br>
			<?php 
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
			if (isset($_POST['Login'])) {
			$User = filter_var($_POST['Login'], FILTER_SANITIZE_STRING);
			$pass = filter_var($_POST['Passwd'], FILTER_SANITIZE_STRING);
			$query = "SELECT * FROM userdata WHERE Username = '$User'";
			$result = $dbHandler->query($query);
			$row = $result->fetch(PDO::FETCH_ASSOC);
			var_dump($pass);
			if ($row['Username'] == "$User" && password_verify($pass,$row['Password']))
			{
			session_start();
			$_SESSION['User'] = filter_var($_POST['Login'], FILTER_SANITIZE_STRING);
			echo $_SESSION['User'];
			header('Location: userpage.php');
			}
			else { die('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."hmmm.... We don't recognise those login credentials, are you sure they're correct?");
			}
		}
		 	?>
</body>
<footer id="footer"><h2>Contact Information</h2>
<p>Phone Number : 01954 231550</p>
<p>Fax: 01954 231573</p></footer>
</html>