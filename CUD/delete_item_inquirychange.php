<?php
$id = $_GET['delID'];
include("C:/xampp/htdocs/admin2/includes/connection.php");

$sql = "DELETE FROM inq_has_mat WHERE line_item =$id";
if(mysqli_query($connect,$sql))
{
	header('location:http://localhost/admin2/sd_inquery_display.php');
}
else
{
	die('Could not delete record:' .mysqli_error());
}
?>