<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$cus_id=$_POST['cus_id'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$gender=$_POST['gender'];
	$customerType=$_POST['customer_type'];
	$DOB=$_POST['DOB'];
	$house_number=$_POST['house_number'];
	$district=$_POST['district'];
	$province=$_POST['province'];
	$post_code=$_POST['post_code'];


	$sql =sprintf("UPDATE customer SET first_name='%s',last_name='%s',gender='%s',customer_type_id='%s',DOB='%s',house_number='%s',district='%s',province='%s',post_code='%s' WHERE customer_id = '%s'"
	, mysqli_real_escape_string($connect, $firstName)
	, mysqli_real_escape_string($connect, $lastName)
	, mysqli_real_escape_string($connect, $gender)
	, mysqli_real_escape_string($connect, $customerType)
	, mysqli_real_escape_string($connect, $DOB)
	, mysqli_real_escape_string($connect, $house_number)
	, mysqli_real_escape_string($connect, $district)
	, mysqli_real_escape_string($connect, $province)
	, mysqli_real_escape_string($connect, $post_code)
	, mysqli_real_escape_string($connect, $cus_id));

	if(mysqli_query($connect,$sql))
	{
		header('location: http://localhost/admin2/users.php');
	}
	else
	{
		die('Unable to update record: ' .mysql_error());
	}
?>