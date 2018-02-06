<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("Script/sd.php");
     if(!empty($_POST))
    {
    	$_SESSION["inq_number"] = $_POST['inq_number'];
    	$_SESSION['custo_id']=$_POST['custo_id'];
    }
    $inq_id=$_SESSION["inq_number"];
    $custo_id=$_SESSION['custo_id'];
    $date=strtotime("+1 day");
    $inv_id="INV$inq_id";
    $so_id="SO$inq_id";

    include("includes/connection.php");
	$sql6 = "SELECT * FROM document WHERE doc_id = '$inv_id'";
	$result6=mysqli_query($connect,$sql6);
	$row6=mysqli_fetch_array($result6); 
    
?>
<script language="javascript">
	function fncSubmit(strPage)
	{
	if(strPage == "page1")
	{
	document.form1.action="CUD/create_inv_doc.php";
	}

	document.form1.submit();
	}
</script>
<form action="" method="post" name="form1" id="form1">			
<div class="row-fluid sortable">		

	
	<div class="container">
<a href="sd_invoice_pre.php?id=<?= $custo_id ?>" class="btn btn-danger" role="button">Back</a>
  
	</div>
			<p></p>
	<p></p>
					   	
						<div class="box span12" style="margin-left: 0px;">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Create Invoice</h2>
					</div>
					<div class="box-content"  	> 
						<input type="hidden" name="so_id" value="<?= $so_id ?>"/>
						<input type="hidden" name="inv_id" value="<?= $inv_id ?>">
						<input type="hidden" name="in_id" value="<?= $inq_id ?>">
						<input type="hidden" name="cust_id" value="<?= $custo_id ?>">
						<!-- <input type="hidden" name="in_id" value="<?= $inq_id ?>">
						<input type="hidden" name="in_id" value="<?= $inq_id ?>"> -->
						 <button type="button" class="btn btn-primary btn-lg" onClick="JavaScript:fncSubmit('page1')">Submit</button>
						 <label for="usr">
						<h2>Invoice number : <?= $inv_id ?></h2>
						<h2>Document Date : <?= date('d-m-Y') ?></h2>
						<p> </p>
						<p> </p>
						</label>
						 <div class="form-group">
							  <br>					
							 <h3> Header</h3>
							 <label for="usr">
								Customer number : <input type="text" class="form-control" id="cusnum" disabled placeholder="<?= $custo_id ?>">   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
								<?php   
								include("includes/connection.php");
								$sql4 = "SELECT * FROM customer WHERE customer_id = '$custo_id'";
								$result4=mysqli_query($connect,$sql4);
								$row4=mysqli_fetch_array($result4);
								?>  
								<?= $row4['first_name'].' '.$row4['last_name'] ?>
							 </label> 
							  <label for="usr">
								Sale order number: <input type="text" class="form-control" id="cusnum" disabled placeholder="<?php echo 'SO'.$inq_id ?>">   
							 </label> 
							<label for="usr">
								PO Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="text" class="form-control" id="ponum" disabled placeholder="PO<?= $inq_id ?>">  
								&nbsp;&nbsp;&nbsp;PO Date : <input type="text" class="form-control" id="podate" disabled placeholder="<?= date('d-m-Y', $date) ?>">
							 </label> 
							 <label for="usr">
								Billing Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="date" name="bill_date" class="form-control" value="<?= $row6['billing_date'] ?>">   
							 </label>
					 
						</div>
						 <div class="form-group">
							 
							  <br>
							 <h2>Item Overview</h2>
							 <?php   
								include("includes/connection.php");
								$sql3 = "SELECT * FROM document WHERE doc_id = '$inq_id'";
								$result3=mysqli_query($connect,$sql3);
								$row3=mysqli_fetch_array($result3);
								?>
							 
							 
							<label for="usr">

						<table class="table table-striped table-bordered  bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th></th>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  <th>Unit type</th>
								  <th>Price</th>
								  <th>Discount(%)</th>
								  <th>Amount</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								
								include("includes/connection.php");
								$sql2 = "SELECT * FROM inq_has_mat INNER JOIN material USING(material_number) WHERE doc_id = '$inq_id'";
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
								 ?>
							<tr>
								<td></td>
								<td><?= $row2['material_number'] ?></td>
								<td><?= $row2['description'] ?></td>
								<td><?= $row2['quantity'] ?></td>
								<td><?= $row2['unit_type'] ?></td>
								<td><?= number_format($row2['price'],2) ?></td>
								<td><?= $discount ?></td>
								<td><?= number_format($Amount,2) ?></td>
							</tr>
							<?php
							   $total=$sub_total-$total_discount_price; } //close of while
							?>
							  
							  <tr >
							    <td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td align="right">   <h2> Sub Total</h2></td>
								<td><?= number_format($sub_total,2) ?></td>
							  </tr>
							  
							  <tr >
							    <td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								  <td align="right"> <h2> Discount(<?= $total_discount ?>%)</h2> </td>
								<td><?= number_format($total_discount_price,2) ?></td>
							  </tr>
							   <tr >
							    <td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td align="right">  <h2> Total</h2></td>
								<td><?= number_format($total,2) ?></td>
								<input type="hidden" name="net_price" value="<?= $total ?>">
							  </tr>
						  </tbody>
					  </table>          
							 </label> 
							
						</div>

				</div>
					</div>
						</div>

					</div>
					</div>
	
	        
	

	
</div>

</div><!--/row-->

</form>


<?php
	get_footer();
?>		

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->