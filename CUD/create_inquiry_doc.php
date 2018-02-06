<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$request=$_POST['request'];
	$id=$_POST['doc_id'];
	$doc_type='1';
	$cus_id=$_POST['customer_id'];

if($request==''){
	
//	header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('คุณไม่ได้กรอกวันที่กรุณากรอกวันที่');
					window.location.href='http://localhost/admin2/sd_inquery.php';
					</script>";
}
else {

	$sql7 = "select * from document  where doc_id='$id'";
		$result7=mysqli_query($connect,$sql7);
		$rows7 =mysqli_num_rows($result7);
		$i=0;
		if($rows7>$i){
			// echo "<script>
			//   alert('ขออภัย document $id มีอยู่ในระบบแล้ว ดำเนินการต่อจะเป็นการ Update');
			// </script>";
			$sql="UPDATE document SET request_date = '$request'  WHERE doc_id = '$id'";

			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Inquiry $id was updated.');
					window.location.href='http://localhost/admin2/before_inq.php';
					</script>";
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
		else
		{

			$sql=sprintf("INSERT INTO document(doc_id,request_date,doc_date,customer_id,doc_type_id) 
				VALUES('%s','%s','%s','%s','%s')"
			, mysqli_real_escape_string($connect, $id)
			, mysqli_real_escape_string($connect, $request)
			, mysqli_real_escape_string($connect, date('Y-m-d'))
			, mysqli_real_escape_string($connect, $cus_id)
			, mysqli_real_escape_string($connect, $doc_type));

			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Inquiry $id was created.');
					window.location.href='http://localhost/admin2/before_inq.php';
					</script>";
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
}
?>