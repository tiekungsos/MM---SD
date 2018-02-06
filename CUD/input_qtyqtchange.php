<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$qty=$_POST['qty'];
	$line_id=$_POST['line_id'];


	$sql =sprintf("UPDATE inq_has_mat SET quantity='%s' WHERE line_item = '%s'"
	, mysqli_real_escape_string($connect, $qty)
	, mysqli_real_escape_string($connect, $line_id));

	if(mysqli_query($connect,$sql))
	{
		header('location: http://localhost/admin2/sd_qt_display.php');
		// echo $line_id;
		// echo $qty;
	}
	else
	{
		die('Unable to update record: ' .mysql_error());
	}


?>