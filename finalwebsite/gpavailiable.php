<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
		<script type="text/javascript" src="usectrl.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
	</header>
</head>
<body>
	<div id="creationback">
<h2>Book a GP / Nurse Appointment</h2>
	<form method="post">
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
				<option disabled="_________"></option>
		<optgroup label="Other">
			<option value="A">All</option>
		</optgroup>
	</select>
	<select name="test1">
		<?php $date = date("d-m-Y");
			for ($x = 0; $x <= 45; $x++)
			{
    			echo '<option value='.date("d-m-Y", strtotime("$date.  + $x weekdays")).'>'	.	date("d-m-Y", strtotime("$date.  + $x weekdays"))	.	'</option>';
			} 
		?>		
	</select>
		<br><br><input type="submit" type="button"name="" value="OK">
	</form>
	<br><br>
	<div id="tabs">
	<?php
	if (isset($_POST['test1'])) {
	$date=date_create($_POST['test1']);
$timestamp = date_format($date,"Y/m/d");
$dayOfWeek = date("l", strtotime($timestamp));
	if ($dayOfWeek == "Monday") {
	$t = 30 ;
	}
	if ($dayOfWeek == "Tuesday") {
	$t = 20 ;
	}
	if ($dayOfWeek == "Wednesday") {
	$t = 15 ;
	}
	if ($dayOfWeek == "Thursday") {
	$t = 25 ;
	}
	if ($dayOfWeek == "Friday") {
	$t = 15 ;
	}
		}
		if (!isset($t)) {
			$t = 0;
		}
//$selectedTime = strtotime("9:15:00" + '15 minutes');
	for ($j=0; $j < $t; $j++) { 
		$q = $j + 1;
		var_dump($q);
	 	echo date('H:i:s', strtotime( "8:00:00.  + "	.	$j * 20	.	" minutes"))	.	"&nbsp;&nbsp;&nbsp;&nbsp;"	.	"<input type = 'submit' class = 'button' onclick='javascript:booking".$q."();' value = 'Book Appointment'></input><br>"	.	"<br><hr id ='bookline'><br>";	
	 } 
	  ?>
	  </div>
	</div>
</body>
<footer id="footer"></footer>
</html>