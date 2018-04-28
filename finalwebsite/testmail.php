<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
		<div id="loginmain">
		<input type="Username" name="Login" placeholder="Username" >
<input type="Password" name="Passwd" placeholder="Password">
<a href = "userpage.php"><button>Login</button></a>
<p>Don't have an account with us? Click <a href="createacc.php">here</a> to sign up</p>
<p><a href="">Forgotten Password</a></p>
</div>
	</header>
</head>
<body>
<?php 
mail("willrathlou@hotmail.com", "Test Message", "Hello There","From: outpost.render@gmail.com");
?>
</body>
<footer id="footer"><h2>Contact Information</h2>
<p>Phone Number : 01954 231550</p>
<p>Fax: 01954 231573</p></footer>
</html>