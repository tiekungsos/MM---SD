<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$request=$_POST['request'];
	$qt_id=$_POST['qt_id'];
	$ref_doc=$_POST['in_id'];
	$doc_type=2;
	$cus_id=$_POST['cust_id'];
if($request==''){
	
//	header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('คุณไม่ได้กรอกวันที่กรุณากรอกวันที่');
					window.location.href='http://localhost/admin2/sd_qt.php';
					</script>";
}
else {
	
	$sql2 = "select * from document  where doc_id='$qt_id'";
		$result2=mysqli_query($connect,$sql2);
		$rows2 =mysqli_num_rows($result2);
		$i=0;
		if($rows2>$i){
			// echo "<script>
			//   alert('ขออภัย document $id มีอยู่ในระบบแล้ว ดำเนินการต่อจะเป็นการ Update');
			// </script>";
			$sql="UPDATE document SET request_date = '$request'  WHERE doc_id = '$qt_id'";

			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Quotation $qt_id was updated.');
					window.location.href='http://localhost/admin2/sd_qt.php';
					</script>";
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
		else
		{

			$sql=sprintf("INSERT INTO document(doc_id,request_date,doc_date,customer_id,doc_type_id,ref_doc) 
				VALUES('%s','%s','%s','%s','%s','%s')"
			, mysqli_real_escape_string($connect, $qt_id)
			, mysqli_real_escape_string($connect, $request)
			, mysqli_real_escape_string($connect, date('Y-m-d'))
			, mysqli_real_escape_string($connect, $cus_id)
			, mysqli_real_escape_string($connect, $doc_type)
			, mysqli_real_escape_string($connect, $ref_doc));
			if(mysqli_query($connect,$sql))
			{
				// header('location: http://localhost/admin2/sd_inquery.php');
				 echo "<script>
					alert('Quotation $qt_id was created.');
					window.location.href='http://localhost/admin2/sd_qt.php';
					</script>";
			}
			else
			{
				die('Could not delete record:' .mysql_error());
			}
		}
}

?>