<?php
$id = $_GET['delID'];
include("C:/xampp/htdocs/admin2/includes/connection.php");

$sql = "DELETE FROM vendor WHERE vendor_id=$id";
if(mysqli_query($connect,$sql))
{
	header('location:http://localhost/admin2/supplier.php');
}
else
{
	die('Could not delete record:' .mysqli_error());
}
?>