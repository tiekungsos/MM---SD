<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$qty=$_POST['qty'];
	$line_id=$_POST['line_id'];

	$sql2="SELECT * FROM inq_has_mat INNER JOIN material USING(material_number) WHERE line_item = '$line_id'";
	$result2=mysqli_query($connect,$sql2);
	$row2=mysqli_fetch_array($result2);

	
	if($qty>$row2['default_qty'])
	{
		echo $row2['default_qty'];
		echo "<script>
		alert('!! Product are not enough items for sale.');
		window.location.href='http://localhost/admin2/sd_qt_next.php';
		</script>";
		
	}
	else
	{
		$sql =sprintf("UPDATE inq_has_mat SET quantity='%s' WHERE line_item = '%s'"
		, mysqli_real_escape_string($connect, $qty)
		, mysqli_real_escape_string($connect, $line_id));

		if(mysqli_query($connect,$sql))
		{
			header('location: http://localhost/admin2/sd_qt_next.php');
			// echo $line_id;
			// echo $qty;
		}
		else
		{
			die('Unable to update record: ' .mysql_error());
		}
	}

?>