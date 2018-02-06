<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$cus_id=$_GET['cus_id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="sd_inquiry"><input type="hidden" name="cus_id" value="<?php echo $cus_id?>"></form>
</body>
</html>