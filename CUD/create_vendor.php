<?php 
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$company_name=$_POST['company_name'];
	$house_number=$_POST['house_number'];
	$district=$_POST['district'];
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$province=$_POST['province'];
	$post_code=$_POST['post_code'];

	$sql=sprintf("INSERT INTO vendor(company_name,v_house_number,v_district,tel,email,v_province,v_post_code) 
		VALUES('%s','%s','%s','%s','%s','%s','%s')"
	, mysqli_real_escape_string($connect, $company_name)
	, mysqli_real_escape_string($connect, $house_number)
	, mysqli_real_escape_string($connect, $district)
	, mysqli_real_escape_string($connect, $tel)
	, mysqli_real_escape_string($connect, $email)
	, mysqli_real_escape_string($connect, $province)
	, mysqli_real_escape_string($connect, $post_code));

	if(mysqli_query($connect,$sql))
	{
		header('location: http://localhost/admin2/supplier.php');
	}
	else
	{
		die('Could not delete record:' .mysql_error());
	}
 ?>