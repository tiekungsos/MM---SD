<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$request=$_POST['request'];
	$so_id=$_POST['so_id'];
	$ref_doc=$_POST['in_id'];
	$doc_type=3;
	$cus_id=$_POST['cust_id'];

	$sql2 = "select * from document  where doc_id='$so_id'";
		$result2=mysqli_query($connect,$sql2);
		$rows2 =mysqli_num_rows($result2);
		$i=0;
		if($rows2>$i){
			echo "<script>
			 alert('ขออภัย document $so_id มีอยู่ในระบบแล้ว');
			window.location.href='http://localhost/admin2/sd_sale_next.php';
			</script>";
			return 0;
		}

	$sql=sprintf("INSERT INTO document(doc_id,request_date,doc_date,customer_id,doc_type_id,ref_doc) 
		VALUES('%s','%s','%s','%s','%s','%s')"
	, mysqli_real_escape_string($connect, $so_id)
	, mysqli_real_escape_string($connect, $request)
	, mysqli_real_escape_string($connect, date('Y-m-d'))
	, mysqli_real_escape_string($connect, $cus_id)
	, mysqli_real_escape_string($connect, $doc_type)
	, mysqli_real_escape_string($connect, $ref_doc));

	if(mysqli_query($connect,$sql))
	{
		// header('location: http://localhost/admin2/sd_qt.php');
		

   		 echo "<script>
			alert('Sale order $so_id was created.');
			window.location.href='http://localhost/admin2/sd_sale.php';
			</script>";
	}
	else
	{
		die('Could not delete record:' .mysql_error());
	}

?>