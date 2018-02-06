<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$qty=$_POST['qty'];
	$line_id=$_POST['line_id'];


	$sql =sprintf("UPDATE doc_mm_has_material SET quantity='%s' WHERE line_item_mm_id = '%s'"
	, mysqli_real_escape_string($connect, $qty)
	, mysqli_real_escape_string($connect, $line_id));

	if(mysqli_query($connect,$sql))
	{
		header('location: http://localhost/admin2/mm_po_next.php');
		// echo $line_id;
		// echo $qty;
	}
	else
	{
		die('Unable to update record: ' .mysql_error());
	}


?>