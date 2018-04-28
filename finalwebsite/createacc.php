<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="primary.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript" src="jscript1.js"></script>
			<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"</a></a></p>
	</header>
</head>
<body>
<div id="creationback">
	<h1>Account Creation</h1>
	<form action="createacc.php" method="POST">
	<input type="textbox" name="FirstName" class="input" placeholder="First Name" required>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="textbox" name="LastName" class="input" placeholder="Last Name" required>
	<br>
	<input type="email" name="maildress" class="input2" placeholder="Email Address" required>
	<br>
		<input type="textbox" name="NI" class="input" placeholder="NI Number (without spaces)" maxlength="9" required>
		<br>
			<input type="text" name="Postcode" class="input" placeholder="Postcode (no spaces)" minlength="7" required>
		<br>
			<input type="password" name="PW" class="input" placeholder="Password" required>
		<p>Security Question 1</p>
		<select name="Security Question A">
			<option value="A">What is your mothers maiden name?</option>
			<option value="B">What was your first pets name?</option>
			<option value="C">In what city was your first job?</option>
			<option value="D">What is your favorite movie?</option>
			<option value="E">Which is your favorite web browser?</option>
			<option value="F">What was the make of your first car?</option>
			<option value="G">Who is your favorite actor, musician, or artist?</option>
		</select>
			</datalist>
				<br>
			<input type="textbox" name="Answer" class="input" placeholder="Answer to Security Question 1" required>
			</datalist>
		<br>
		<br>
		<button type="submit">Sign Up</button>
		</form>
		<?php
		//Random number generator
		$rannum = substr((rand()),1,6);
	if (isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['maildress']) && isset($_POST['NI'])
	&& isset($_POST['Postcode']) && isset($_POST['Answer']) && $_POST['PW']) {
		//FirstName
		$FirstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING);
		//LastName
		$LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_STRING);
		//Username Composer
		$Username = substr($FirstName,0,1). $LastName . $rannum;
		//Email Address
		$MailAddress = filter_var($_POST['maildress'], FILTER_SANITIZE_STRING);
		//NI Number
		$NI = filter_var($_POST['NI'], FILTER_SANITIZE_STRING);
		//Postcode
		$postcode = filter_var($_POST['Postcode'], FILTER_SANITIZE_STRING);
		//Password
		$pass = filter_var($_POST['PW'], FILTER_SANITIZE_STRING);
		//Security Question Answer
		$answer = filter_var($_POST['Answer'], FILTER_SANITIZE_STRING);
		//Hashed Password
		$encrypt_pass = password_hash($pass, PASSWORD_BCRYPT);
		if(6 > strlen($pass)){
			echo "<script>alert('Your Password Must Be Longer Than 6 Characters');</script>";
		}
		$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
		$user ='root';
		$password = '';
		try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}
		$firstquery = "SELECT * FROM userdata WHERE Email = '$MailAddress'";
		$result = $dbHandler->query($firstquery);
			if (!$row = $result->fetch(PDO::FETCH_ASSOC)){
			$sqlQuery = "INSERT INTO majorvalue VALUES(?,?,?,?,?,?)";
			$query = $dbHandler->prepare($sqlQuery);
			//execute the query
			$query->execute(array("$Username","$FirstName","$LastName","$NI","$postcode","$answer"));
			$sqlQuery = "INSERT INTO userdata VALUES(?,?,?,?)";
			$query = $dbHandler->prepare($sqlQuery);
			$query->execute(array("$Username","$encrypt_pass", "visitor", $MailAddress));}
		else{
			echo "<script>alert('It appears you already have an account with us! Please contact us to reset your password')</script>";
		}
	}
		//debugger
	//	echo"Username: ".$Username."<br><br>";
	//	echo $MailAddress."<br><br>";
		//echo $NI."<br><br>";
	//	echo $postcode."<br><br>";
	//	echo strlen($pass);
	//	echo $encrypt_pass."<br>";
	//	echo strlen($encrypt_pass);
	//	echo $answer;
	//	mail("willrathlou@hotmail.com", "Test Message", $Username,"From: outpost.render@gmail.com");
		 ?>
</div>
</body>
</html>