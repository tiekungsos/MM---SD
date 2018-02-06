<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$vendor_id=$_POST['vendor_id'];
	$company_name=$_POST['company_name'];
	$house_number=$_POST['house_number'];
	$district=$_POST['district'];
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$province=$_POST['province'];
	$post_code=$_POST['post_code'];

	$sql=sprintf("UPDATE vendor SET company_name = '%s',v_house_number = '%s',v_district = '%s',tel = '%s',email = '%s',v_province = '%s',v_post_code = '%s' WHERE vendor_id = '%s'"
	, mysqli_real_escape_string($connect, $company_name)
	, mysqli_real_escape_string($connect, $house_number)
	, mysqli_real_escape_string($connect, $district)
	, mysqli_real_escape_string($connect, $tel)
	, mysqli_real_escape_string($connect, $email)
	, mysqli_real_escape_string($connect, $province)
	, mysqli_real_escape_string($connect, $post_code)
	, mysqli_real_escape_string($connect, $vendor_id));

	if(mysqli_query($connect,$sql))
	{
		header('location: http://localhost/admin2/supplier.php');
	}
	else
	{
		die('Could not delete record:' .mysql_error());
	}
?>