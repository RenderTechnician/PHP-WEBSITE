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
<h2>Book a GP / Nurse Appointment</h2>
	<select>
		<optgroup label="Doctors">
			<option value="A">Dr Judith Davis</option>
			<option value="A">Dr Craig Needs</option>
			<option value="A">Dr Richard Maddison</option>
			<option value="A">Dr Lowery</option>
		</optgroup>
		<option disabled="_________"></option>
		<optgroup label="Nurses">
			<option value="A">Lesley Bowring</option>
			<option value="A">Elaine Dockrill</option>
			<option value="A">Carole Spelzini</option>
		</optgroup>
	</select>
	<select>
		<?php $date = date("d-m-Y");
			for ($x = 0; $x <= 45; $x++)
			{
    			echo '<option value="">'	.	date("d-m-Y", strtotime("$date.  + $x weekdays"))	.	'</option>';
			} 
		?>		
	</select>
	<br><br>
	<div id="tabs">
	<?php
//$selectedTime = strtotime("9:15:00" + '15 minutes');
	for ($j=0; $j < 10; $j++) { 
	 	echo date('H:i:s', strtotime( "9:15:00.  + "	.	$j * 15	.	" minutes"))	.	"<br>"	.	"<a href='/index.php'>Book Appointment</a><br>"	.	"<br><hr id ='bookline'><br>";		
	// 	echo "<img src='/TESTTAB.png' class ='tabs'>"	.	"1234"	.	"<br><br>";
	 } 
	  ?>
	  </div>
	</div>

</body>
<footer id="footer"></footer>
</html>