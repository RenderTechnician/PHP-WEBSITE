<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
		<script type="text/javascript" src="usectrl.js"></script>
				<script type="text/javascript" src="booking.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
		<?php 
			session_start();
			$cuser = $_SESSION['User'];
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}?>
	</header>
</head>
<body>
	<div id="creationback">
<h2>Book a GP / Nurse Appointment On Behalf Of a Patient</h2>
	<form method="post">
	<select name ="DRNSETC">
		<option value="">--Please Select A Value--</option>
		<optgroup label="Doctors">
			<option value="Dr Judith Davis">Dr Judith Davis</option>
			<option value="Dr Craig Needs">Dr Craig Needs</option>
			<option value="Dr Richard Maddison">Dr Richard Maddison</option>
			<option value="Dr Lowery">Dr Lowery</option>
		</optgroup>
		<option disabled="_________"></option>
		<optgroup label="Nurses">
			<option value="Lesley Bowring">Lesley Bowring</option>
			<option value="Elaine Dockrill">Elaine Dockrill</option>
			<option value="Carole Spelzini">Carole Spelzini</option>
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
	<select name ="WhoFor">
		<?php 
			$query = "SELECT * FROM majorvalue ORDER BY `Firstname`";
			$result = $dbHandler->query($query);
			while ($row = $result->fetch(PDO::FETCH_ASSOC))
					{
						echo '<option value= '.$row["Username"].'>'.$row["Firstname"] .' '. $row["Lastname"].'</option>';
					}
		?>
	</select>
		<br><br><input type="submit" type="button"name="" value="OK">
	</form>
	<br><br>
	<div id="tabs">
	<?php
	$x = 1;
	$y = 0;
				if (isset($_POST['test1'])) {
			$date = date_create($_POST['test1']);
			$timestamp = date_format($date,"Y-m-d");}
			if (isset($_POST['DRNSETC'])) {
			$DRN = $_POST['DRNSETC'];
		//Isthedrnursepartvalid?
			$postvalidvalues = array('Dr Judith Davis','Dr Craig Needs','Dr Richard Maddison','Dr Lowery','Lesley Bowring','Elaine Dockrill','Carole Spelzini');

		if (!in_array($DRN, $postvalidvalues)) 
		{
			echo'<script language="javascript">    
          	 alert("No Staff Member Selected, please select a staff member to book ");
      		</script>';
		}
}
			$posteduser = $_POST['WhoFor'];
			//var_dump($timestamp);
			@$query = "SELECT * FROM appointments WHERE Person = '$posteduser' AND Date = '$timestamp' AND DRNS = '$DRN' ORDER BY `Time`";
			$result = $dbHandler->query($query);
			$row = $result->fetchall(PDO::FETCH_ASSOC);
	if (isset($_POST['test1'])) {
	$date = date_create($_POST['test1']);
	$timestamp = date_format($date,"Y-m-d");
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
		$time = date('H:i:s', strtotime( "8:00:00.  + "	.	$j * 20	.	" minutes"));
		@$datecompare = $row[$y]['Date'];
		while ($datecompare == $timestamp && $time == @$row[$y]['Time'] && $DRN == @$row[$y]['DRNS']){
			$j++;
			$y++;
			$q++;
			$time = date('H:i:s', strtotime( "8:00:00.  + "	.	$j * 20	.	" minutes"));
		}
//For sending data to another page	
$_SESSION['timestore'] = $timestamp;
$_SESSION['DON'] = $DRN;
		if (in_array($DRN, $postvalidvalues) && (!(date("H:i:s") > $time  && date("Y-m-d") == $timestamp))){
	 	echo date('H:i:s', strtotime( "8:00:00.  + "	.	$j * 20	.	" minutes"))	.	"&nbsp;&nbsp;&nbsp;&nbsp;"	.	"<input type = 'submit' class = 'button' onclick='javascript:booking".$q."(); 	' value = 'Book Appointment'></input><br>"	.	"<br><hr id ='bookline'><br>";}
	 		 $_SESSION['Super'] = $_POST['WhoFor'];
	 }
	  ?>
	  </div>
	</div>
</body>
<footer id="footer"></footer>
</html>