<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="primary.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jscript1.js"></script>
	<script type="text/javascript" src="usectrl.js"></script>
	<header id = homeheader><p id="over">&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="/over_logo.png" class="over_logo"></a></p>
		<p id="logout"><a href="/PHP-WEBSITE-master/finalwebsite/index.php" >Logout</a></p>
</div>
	</header>
</head>
<body>
	<p id="isthisyou"><?php 
			$dsn = 'mysql:host=127.0.0.1;dbname=finalwebsite;';
			$user ='root';
			$password = '';
			try{$dbHandler = new PDO($dsn,$user,$password);} catch (PDOException $e){die('sorry,database problem');}?>
				Logged in as 
				<!-- Controls the top name display, selects the first & last name from database majorvalue based on the login username -->
				<?php session_start(); 

				$user = $_SESSION['User'];
			 	$query = "SELECT * FROM majorvalue WHERE Username = '$user'";
			 	$result = $dbHandler->query($query);
			 	$row =$result->fetch();
			 	echo $row['Firstname']. " ". $row['Lastname']; 
			 	//Controls the user clearance, based on the username adjacent in the database
			 	$query = "SELECT * FROM userdata WHERE Username = '$user'";
			 	$result = $dbHandler->query($query);
			 	$row = $result->fetch();
			 	$_SESSION['Priv'] = $row['Clearance'];
			 	?>

				, Not you? <a href="/PHP-WEBSITE-master/finalwebsite/index.php">Click Here</a></p>
	<br>
	<div id="gav_parent"
		<p><a href="gpavailiable.php"><img onmouseout="this.src='/gpav1.png'" onmouseover="this.src='/gpav2.png'" src="/gpav1.png"  class="gpav" ></a></p>
		<p><a href="testresults.php"><img onmouseout="this.src='/tr1.png'" onmouseover="this.src='/tr2.png'" src="/tr1.png"  class="gpav"></a></p>
		<p><a href="renewpre.php"><img onmouseout="this.src='/pre1.png'" onmouseover="this.src='/pre2.png'" src="/pre1.png"  class="gpav"></a></p>
		<p><a href="appointments.php"><img onmouseout="this.src='/app1.png'" onmouseover="this.src='/app2.png'" src="/app1.png"  class="gpav"></a></p>
		</div>
		<div id="gav_parent2">
		<!--<p><a href="appcal.php"><img onmouseout="this.src='/ac1.png'" onmouseover="this.src='/ac2.png'" src="/ac1.png"  class="gpav2"></a></p> -->
		<p><img onmouseout="this.src='/ac1.png'" onmouseover="this.src='/ac2.png'" src="/ac1.png"  class="gpav2" onclick="<?php 
		if ($_SESSION['Priv'] == "root"){ echo ("location.href='appcal.php'");} ?>"></p>
		<p><img onmouseout="this.src='/ma1.png'" onmouseover="this.src='/ma2.png'" src="/ma1.png"  class="gpav2" onclick="<?php 
		if ($_SESSION['Priv'] == "root"){ echo ("location.href='modapp.php'");} ?>"></p>
			<?php 
			if ($_SESSION['Priv'] == "visitor") {
			echo '<script language="javascript">    
            document.getElementById("gav_parent2").style.opacity = "0.0";
      		</script>';}
      		if ($_SESSION['Priv'] == "root") {
			echo '<script language="javascript">    
            document.getElementById("gav_parent2").style.opacity = "1.0";
      		</script>';}
		?>
	</div>
	<?php 
if(!isset($_SESSION['User'])){
	header('Location: index.php');
}
	 ?>
	 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ad6191b227d3d7edc2408ae/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>