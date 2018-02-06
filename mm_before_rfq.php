<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
		get_bread_five();
    //require_once("Script/sd.php");
    $vendor_id=NULL;
    if(!empty($_GET))
    {
    	$vendor_id=$_GET['id'];
    }
    include("includes/connection.php");
	$sql = "SELECT * FROM document_mm WHERE doc_mm_type_id = 1 ORDER BY doc_mm_id DESC LIMIT 1";
	$result=mysqli_query($connect,$sql);
	$row=mysqli_fetch_array($result);
	$new_id=$row['doc_mm_id']+1;
?>
<script language="javascript">
	function fncSubmit(strPage)
	{
	if(strPage == "page1")
	{
	document.form1.action="mm_rfq_display.php";
	}
	if(strPage == "page2")
	{
	document.form1.action="mm_rfq_display.php";
	}
	
	document.form1.submit();
	}
</script>

<div class="row-fluid sortable">		

	
	<div class="container">
<!--		<button type="button" class="btn btn-primary" id="Display" value="2">Create</button>   -->
  <!-- <button type="button" class="btn btn-primary" id="Change" value="1">Change</button>     
  <button type="button" class="btn btn-primary" id="Create" value="3">Display</button>   -->   
	</div>
			<p></p>
	<p></p>
	<div class="box span12" style="margin-left: 0px;">
					<form action="mm_request.php" method="post">
						<div style="display: none">
							 
								 <input type="number" name="custo_id"  class="form-control"  value="<?= $vendor_id ?>"  oninvalid="alert('โปรดเลือก Customer ');"  required >
							 </div>
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Find Vendor</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"> 
						<?php   
								include("includes/connection.php");
								$sql3 = "SELECT * FROM vendor WHERE vendor_id = '$vendor_id'";
								$result3=mysqli_query($connect,$sql3);
								$row3=mysqli_fetch_array($result3);
						?>
						 <div class="form-group">
							 <br>
							 <label>	  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalcustomer">Find Vendor</button>&nbsp; &nbsp;  <input type="text" name="vendor_id" value="<?= $vendor_id ?>"   class="form-control" disabled> <input type="hidden" name="vendor_id" value="<?= $vendor_id ?>"  > </label> <p></p> 
							<label>Company Name  : <input type="text" name="customer"  class="form-control"  value="<?= $row3['company_name'] ?>" disabled></label>  
							<label>Address &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; : <input type="text" name="customer"  class="form-control"  value="<?= $row3['v_house_number'].' '.$row3['v_district'].' '.$row3['v_province'] ?>" disabled></label> 
							<label>E-mail &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; :  <input type="text" name="customer"  class="form-control"  value="<?= $row3['email'] ?>" disabled></label> 
						</div>
						<p></p>
						<p></p>
					</div>
					
						
					</div>
<!--		matiral show -->
		
		   		<div class="box span12" style="margin-left: 0px;">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Material show</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"> 
						
						 <div class="form-group">
							 <br>

							 <table class="table table-striped table-bordered ">
						  <thead>
							  <tr>
							  		<th>Material number</th>
								  <th>Material name</th>
								  <th>Price</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
							@ini_set('display_errors', '0');
								include("includes/connection.php");

								$sql5 = "SELECT * FROM material where vendor_id= $vendor_id";
								$result5=mysqli_query($connect,$sql5); //rs.open sql,con

							while ($row=mysqli_fetch_array($result5))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['material_number']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['cost_price']; ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>    
							 
						</div>
						<p></p>
						<p></p></div>			
					</div>
		
						<div class="box span12" style="margin-left: 0px;">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Create Request for Quotation</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"> 
						
						 <div class="form-group">
							 <br>

							 <label for="usr">Create RFQ Number : <input type="number" name="rfq_number" value="<?= $new_id ?>"  class="form-control" disabled >
							&nbsp;&nbsp;&nbsp;&nbsp; <input type="hidden" name="rfq_number" value="<?= $new_id ?>" >
							
							 <button type="submit" class="btn btn-primary btn-lg" >Submit</button>  
								 
							 </label>  
						</div>
						<p></p>
						<p></p></div>			
					</div>
				</form>
				<form action="mm_rfq_display.php" method="post">
						<div style="display: none">
							 
								 <input type="number" name="custo_id"  class="form-control"  value="<?= $vendor_id ?>"  oninvalid="alert('โปรดเลือก Customer ');"  required >
							 </div>
						<input type="hidden" name="vendor_id" value="<?= $vendor_id ?>">
						<div class="box span12" style="margin-left: 0px;">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Find RFQ</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"> 
						
						 <div class="form-group">
							 <br>
						

							<div class="form-group">
  								<label for="sel1">Request for Quotation List:</label>
  									<select name="rfq_number" onchange="showCustomer(this.value)">
								<?php
									include("includes/connection.php");

									$sql2 = "SELECT * FROM document_mm WHERE vendor_id = '$vendor_id'&& doc_mm_type_id=1 ";
									$result2=mysqli_query($connect,$sql2); //rs.open sql,con

								while ($row=mysqli_fetch_array($result2))
								{ ?><!--open of while -->
									<option value="<?= $row['doc_mm_id'] ?>"><?= $row['doc_mm_id'] ?></option>
								<?php } ?>
								</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button onClick="JavaScript:fncSubmit('page1')" class="btn btn-primary btn-lg" type="submit">Next</button>  
								</div>

							
								 
						</div>
						<p></p>
						<p></p>
						
						
					</div>
						</div>
					</form>

   

    <div class="modal fade bs-example-modal-lg" id="myModalcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Find Customer</h4> 
      </div>
      <div class="modal-body">
		  
		  <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Vendor id</th>
								  <th>Company name</th>
								  <th>Address</th>
								  <th>E-mail</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql2 = "SELECT * FROM vendor ";
								$result2=mysqli_query($connect,$sql2); //rs.open sql,con

							while ($row=mysqli_fetch_array($result2))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['vendor_id']; ?></td>
								<td><?php echo $row['company_name']; ?></td>
								<td><?php echo $row['v_house_number'].' '.$row['v_district'].' '.$row['v_province']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td class="center">
									<a class="btn glyphicon glyphicon-ok" id="add_customer" href="mm_before_rfq.php?id=<?= $row['vendor_id'] ?>" >
										<i class="halflings-icon white edit"></i>
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
  </div>
</div>	
      </div>
    </div>
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