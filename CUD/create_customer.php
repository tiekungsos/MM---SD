<?php 
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$gender=$_POST['optradio'];
	$customerType=$_POST['customer_type'];
	$DOB=$_POST['DOB'];
	$house_number=$_POST['house_number'];
	$District=$_POST['District'];
	$Province=$_POST['Province'];
	$post_code=$_POST['post_code'];

	$sql=sprintf("INSERT INTO customer(first_name,last_name,gender,customer_type_id,DOB,house_number,district,province,post_code) 
		VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s')"
	, mysqli_real_escape_string($connect, $firstName)
	, mysqli_real_escape_string($connect, $lastName)
	, mysqli_real_escape_string($connect, $gender)
	, mysqli_real_escape_string($connect, $customerType)
	, mysqli_real_escape_string($connect, $DOB)
	, mysqli_real_escape_string($connect, $house_number)
	, mysqli_real_escape_string($connect, $District)
	, mysqli_real_escape_string($connect, $Province)
	, mysqli_real_escape_string($connect, $post_code));

	if(mysqli_query($connect,$sql))
	{
		header('location: http://localhost/admin2/users.php');
	}
	else
	{
		die('Could not delete record:' .mysql_error());
	}
 ?>