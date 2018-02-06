<?php
	include("C:/xampp/htdocs/admin2/includes/connection.php");
	$com_id=$_GET['comID'];

	$sql2 = "select * from inq_has_mat  where doc_id='$com_id'";
	$result2=mysqli_query($connect,$sql2);
	$i=0;
	$item = array();
	while ($row2=mysqli_fetch_array($result2))
	{
		$qty[$i]=$row2['quantity'];
		$item[$i]=$row2['material_number'];
		$i++;
	}

	

	for($j=0;$j<$i;$j++)
	{
		$mat_num=$item[$j];
		$sql3 = "select * from material where material_number = '$mat_num'";
		$result3=mysqli_query($connect,$sql3);
		$row3=mysqli_fetch_array($result3);
		$def_qty=$row3['default_qty'];

		
		$update_qty=$def_qty-$qty[$j];

		$sql = "UPDATE material SET default_qty = '$update_qty' where material_number='$item[$j]'";
		mysqli_query($connect,$sql);

		$sql4 = "UPDATE document SET status_gi = '1' where doc_id='SO$com_id'";
		mysqli_query($connect,$sql4);
	}
	echo "<script>
			alert('Good issue commited.');
			window.location.href='http://localhost/admin2/sd_post.php';
			</script>";
?>