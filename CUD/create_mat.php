<?php 
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	
	$mat_name=$_POST['mat_name'];
	$Price=$_POST['Price'];
	$Unit=$_POST['Unit'];
	$vendor_id=$_POST['vendor_id'];
	$Cost=$_POST['Cost'];



	$sql=sprintf("INSERT INTO material(description,price,unit_type,vendor_id,cost_price) 
		VALUES('%s','%s','%s','%s','%s')"
				 
	, mysqli_real_escape_string($connect, $mat_name)
	, mysqli_real_escape_string($connect, $Price)
	, mysqli_real_escape_string($connect, $Unit)
	, mysqli_real_escape_string($connect, $vendor_id)
	, mysqli_real_escape_string($connect, $Cost));


	if(mysqli_query($connect,$sql))
	{
		header('location: http://localhost/admin2/mm_checkstore.php');
	}
	else
	{
		die('Could not delete record:' .mysql_error());
	}
 ?>