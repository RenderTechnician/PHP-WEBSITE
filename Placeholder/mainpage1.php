<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM 1234";
$result = $conn->query($query);
if (!$result) die($conn->error);
echo "1234";
 ?>
</body>
</html>