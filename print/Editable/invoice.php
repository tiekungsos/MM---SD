<?php 	
     $doc_id=NULL;
    if(!empty($_GET))
    {
    	$doc_id=$_GET['uID'];
    	$doc=$_GET['doc'];
    	$custo_id=$_GET['cus'];
    }

					include("includes/connection.php");
					$sql = "SELECT material_number,description,quantity,price,doc_date FROM (document JOIN inq_has_mat using(doc_id) ) join material using(material_number) where doc_id='$doc_id'";

					$sql2 = "SELECT doc_id,material_number,
								description,
								quantity,
								price,
								doc_date,
								first_name,
								last_name,
								house_number,
								district,
								province,
								post_code,
								doc_type_id
					from ((document JOIN inq_has_mat using(doc_id) ) 
						 join material using(material_number)) 
                         join customer using(customer_id) 
					
					where doc_id='$doc_id' limit 1";

					$sql3 = "SELECT doc_id,material_number,
								description,
								quantity,
								price,
								doc_date,
								first_name,
								last_name,
								house_number,
								district,
								province,
								post_code,
								doc_type_id
					from ((document JOIN inq_has_mat using(doc_id) ) 
						 join material using(material_number)) 
                         join customer using(customer_id) 
					
					where doc_id='$doc' limit 1";

					$result=mysqli_query($connect,$sql); //rs.open sql,con
					$result2=mysqli_query($connect,$sql2);
					$result3=mysqli_query($connect,$sql2); //rs.open sql,con
					$result4=mysqli_query($connect,$sql3); //if else 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

	
	<?php $type_id = 0 ;?>
    <textarea id="header">
    	 <?php include("includes/connection.php");
			$sql6 = "SELECT * FROM document where doc_id='$doc'"; 
			$result6=mysqli_query($connect,$sql6); 
			$row=mysqli_fetch_array($result6);
			if ($row['doc_type_id']== 1) {
    				echo "INQUIRYdd";} 
			else if ($row['doc_type_id'] == 2) {
    				echo "QUOTATION";}
			else if ($row['doc_type_id'] == 3) {
	    				echo "SALE ORDER";}
			else if ($row['doc_type_id'] == 4) {
	    				echo "POST GOOD ISSUE";}
			else {
    				echo "INVOICE";}
		?>
		
		</textarea>
		
		<div id="identity">
		     <h3> ADDRESS</h3>
            <textarea id="address">
				<?php while ($row=mysqli_fetch_array($result3)) { 
               echo "\n"; 
			  echo $row['first_name']; echo '&nbsp;&nbsp;';
			   echo $row['last_name']; 
	          echo "\n House number";echo '&nbsp;&nbsp;';
			   echo $row['house_number']; echo "\n";
	 			echo " Districtr";echo '&nbsp;&nbsp;';
			   echo $row['district']; echo "\n";
				echo " Province";echo '&nbsp;&nbsp;';
				echo $row['province']; echo "\n";
	           echo " Post code";echo '&nbsp;&nbsp;';
				echo $row['post_code']; 
					}
                 ?></textarea> 
	
			
            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="logo" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
               <img id="image" src="images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

<!--            <textarea id="customer-title">S-TEACH COMPANY </textarea>-->

            <table id="meta">
                <tr>
                    <td class="meta-head">
                    	<?php include("includes/connection.php");
						$sql6 = "SELECT * FROM document where doc_id='$doc'"; 
						$result6=mysqli_query($connect,$sql6); 
						$row=mysqli_fetch_array($result6);
						if ($row['doc_type_id']== 1) {
			    				echo "INQUIRYdd";} 
						else if ($row['doc_type_id'] == 2) {
			    				echo "Quotation";}
						else if ($row['doc_type_id'] == 3) {
				    				echo "Sale order";}
						else if ($row['doc_type_id'] == 4) {
				    				echo "POST GOOD ISSUE";}
						else {
			    				echo "Invoice";}
						?>		
					</td>
					
                    <td><textarea><?php echo $doc ;?></textarea></td>
                </tr>
                <tr>
                <?php include("includes/connection.php");
					$sql5 = "SELECT * FROM document where doc_id='$doc'"; 
					$result5=mysqli_query($connect,$sql5); 
				?>
				<?php while ($row=mysqli_fetch_array($result5)) { ?>
                    <td class="meta-head">Date Create</td>
                    <td><textarea><?php echo $row['doc_date']; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Today date </td>
                    <td><textarea id="date"> </textarea></td>
                </tr>
                <tr>
                    <td class="meta-head"><?php if($row['doc_type_id']==5){ ?> Billing date <?php } ?><?php if($row['doc_type_id']!=5){ echo 'Request date'; } ?></td>
                    <td><textarea><?php if($row['doc_type_id']==5){ echo $row['billing_date']; } else{ echo $row['request_date']; }  } ?> </textarea></td>
                </tr>
            </table>
		
		</div>
		<?php

		?>
		
		<table id="items">
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Discount</th>
		      <th>Total Amount</th>
		  </tr>
		  <?php
								
								include("includes/connection.php");
								$sql2 = "SELECT * FROM inq_has_mat INNER JOIN material USING(material_number) WHERE doc_id = '$doc_id'";
								$result3=mysqli_query($connect,$sql2); //rs.open sql,con
								$sub_total=0;
								

								$sql5 = "SELECT * FROM customer WHERE customer_id = '$custo_id'";
								$result5=mysqli_query($connect,$sql5);
								$row5=mysqli_fetch_array($result5);
								$custo_type=$row5['customer_type_id'];
								while ($row2=mysqli_fetch_array($result3))
								{  
									$mat_num=$row2['material_number'];
									$sql4 = "SELECT * FROM `condition`  WHERE material_number = '$mat_num' AND  
									customer_type_id='$custo_type'";
									$result4=mysqli_query($connect,$sql4);
									$row4=mysqli_fetch_array($result4); //rs.open sql,con

									$sql5 = "SELECT * FROM `condition`  WHERE material_number = '0' AND  
									customer_type_id='$custo_type'";
									$result5=mysqli_query($connect,$sql5);
									$row5=mysqli_fetch_array($result5);


									$discount=$row4['discount'];
									$Amount=$row2['price']*$row2['quantity']; 
									$discount_price=($discount/100)*$Amount;
									$Amount=$Amount-$discount_price;
									$sub_total+=$Amount;
									$total_discount=$row5['discount'];
									$total_discount_price=($total_discount*$sub_total)/100;
									
								 ?>
			
		  <tr >
		      <td class="item-name"><div class="delete-wpr"><textarea><?= $row2['material_number'] ?></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea><?= $row2['description'] ?></textarea></td>
		      <td><textarea class="cost"><?= number_format($row2['price'],2) ?></textarea></td>
		      <td><textarea class="qty"><?= $row2['quantity'] ?></textarea></td>
			  <?php $sum = $row2['price']*$row2['quantity']; ?>
			  <td><textarea class="cost"><?= $discount ?></textarea></td>
		      <td><span class="price"> <?= number_format($Amount,2) ?></span></td>

		  </tr>
		  
			
			
		 <?php  $total=$sub_total-$total_discount_price; } ?>
		  
<!--
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
-->			
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="2" class="total-line"><b>Subtotal</b></td>
		      <td class="total-value"><div id="subtotal"><b><?php echo "$" ;echo number_format($sub_total,2);?></b></div></td>
		  </tr>
		  <tr>

		      <td colspan="3" class="blank"> </td>
		      <td colspan="2" class="total-line"><b>Discount(%)</b></td>
		      <td class="total-value"><div id="total"><b><?= $total_discount ?></b></div></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="2" class="total-line balance"><b>Balance Due</b></td>
		      <td class="total-value balance"><div class="due"><b>$<?= number_format($total,2) ?></b></div></td>
		  </tr>
			
		</table>
		<?php
								
								include("includes/connection.php");
								$sql2 = "SELECT * FROM inq_has_mat INNER JOIN material USING(material_number) WHERE doc_id = '$doc_id'";
								$result3=mysqli_query($connect,$sql2); //rs.open sql,con
								$sub_total=0;
								

								$sql5 = "SELECT * FROM customer WHERE customer_id = '$custo_id'";
								$result5=mysqli_query($connect,$sql5);
								$row5=mysqli_fetch_array($result5);
								$custo_type=$row5['customer_type_id'];
								$j=0;
								while ($row2=mysqli_fetch_array($result3))
								{  
									$mat_num=$row2['material_number'];
									$sql4 = "SELECT * FROM `condition`  WHERE material_number = '$mat_num' AND  
									customer_type_id='$custo_type'";
									$result4=mysqli_query($connect,$sql4);
									$row4=mysqli_fetch_array($result4); //rs.open sql,con

									$sql5 = "SELECT * FROM `condition`  WHERE material_number = '0' AND  
									customer_type_id='$custo_type'";
									$result5=mysqli_query($connect,$sql5);
									$row5=mysqli_fetch_array($result5);


									$discount=$row4['discount'];
									$Amount=$row2['price']*$row2['quantity']; 
									$discount_price=($discount/100)*$Amount;
									$Amount=$Amount-$discount_price;
									$sub_total+=$Amount;
									$total_discount=$row5['discount'];
									$total_discount_price=($total_discount*$sub_total)/100;
									if($row4['condition_description']!=NULL)
									{
										echo '*'.$row4['condition_description'].'<br/>';
									}
									if($j==0)
									{
										echo '**'.$row5['condition_description'].'<br/>';
										$j=1;
									}
								 }?>
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
	
</body>

</html>