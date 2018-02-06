<?php
	require_once("../admin2/functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("../admin2/Script/sd.php");
    $vendor_id_get=NULL;
    if(!empty($_GET))
    {
    	 $vendor_id_get=$_GET['id'];
    }
    

?>

	

<div class="row-fluid sortable">		

	
	<div class="container">
<!--		<button type="button" class="btn btn-primary" id="Display" value="2">Create</button>   -->
  <!-- <button type="button" class="btn btn-primary" id="Change" value="1">Change</button>     
  <button type="button" class="btn btn-primary" id="Create" value="3">Display</button>   -->   
	</div>
			<p></p>
	<p></p>
			
	
	<div class="box span12" style="margin-left: 0px;">
					
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
								include("../admin2/includes/connection.php");
								$sql3 = "SELECT * FROM vendor WHERE vendor_id = '$vendor_id_get'";
								$result3=mysqli_query($connect,$sql3);
								$row3=mysqli_fetch_array($result3);
						?>
						 <div class="form-group">
							 <br>
							 <label>	  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalcustomer" id="show_vendor">Find Vendor</button> &nbsp; &nbsp;
								 
								 <input type="text" name="vendor" value="<?=  $row3['vendor_id'] ?>"   disabled>
								 
								 <input type="hidden" name="vendor" value="<?= $row3['vendor_id'] ?>" > </label> <p></p> 
							 
							<label>Company Name  :&nbsp; 
								<input type="text" name="vendor"  class="form-control"  value="<?= $row3['company_name']?>" disabled></label>  
							<label>Contact :  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
								<input type="text" name="vendor"  class="form-control"  value="<?= $row3['email'].' '.$row3['tel'] ?>" disabled></labeL>  
						</div>
						<p></p>
						<p></p>
					</div>
					
						
					</div>
		
	
	
	
		<form action="CUD/create_mat.php" method="post">
			<div class="box span12" >
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Create Materials</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					
						</div>
					</div>
					<div class="box-content">
						
    
		   <div class="form-group">			   
  		Materials name: &nbsp;  &nbsp; 
  		<input type="text" class="form-control" name="mat_name" id="mat_name" oninvalid="alert('โปรดกรอกชื่อสินค้า');" required >
		</div>
  
		<div class="form-group">
		Cost price :  &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; 
  		<input type="text" class="form-control" name="Cost" id="Cost" oninvalid="alert('โปรดกรอกราคาต้นทุนสินค้า');" required>
		</div>
						
		  <div class="form-group">
		Sale price :  &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
  		<input type="text" class="form-control" name="Price" id="Price" placeholder="Do not put lower than cost." oninvalid="alert('โปรดกรอกราคาสินค้า');" required>
		</div>
		  

		  <div class="form-group">
  		Unit:  &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
		<input type="text" class="form-control" name="Unittest" id="Unittest"  placeholder="EA" disabled>
		</div>
				<input type="hidden" class="form-control" name="Unit" id="Unit" value="EA" >		
		<!-- <div class="form-group">
  		Vendor name:  &nbsp;  &nbsp;  &nbsp; &nbsp;
		 <input type="text" name="vendor" value="<?= $row3['company_name'] ?>" placeholder="<?= $row3['company_name'] ?>"   class="form-control"  class="form-control" oninvalid="alert('คุณยังไม่ได้เลือก Vendor');" required  >
		</div> -->				
						
		 <input type="hidden" name="vendor_id" value="<?= $row3['vendor_id'] ?>"  class="form-control"  class="form-control"  >
						
		   <button type="button submit" class="btn btn-primary">Create Materials</button>
      </div>
      
    </div>
   </form>	
	
	

    <div class="modal fade bs-example-modal-lg" id="myModalcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Find Vendor</h4> 
      </div>
      <div class="modal-body">
		  
		  <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Company Number</th>
								  <th>Company name</th>
								  <th>Address</th>
								  <th>Contact</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("../admin2/includes/connection.php");

								$sql2 = "SELECT * FROM vendor ";
								$result2=mysqli_query($connect,$sql2); //rs.open sql,con

							while ($row=mysqli_fetch_array($result2))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['vendor_id']; ?></td>
								<td><?php echo $row['company_name']; ?></td>
								<td><?php echo $row['v_district'].' '.$row['v_province'].' '.$row['v_post_code']; ?></td>
								<td><?php echo $row['tel'].' '.$row['email']; ?></td>
								<td class="center">
									<a class="btn glyphicon glyphicon-ok" id="add_customer" href="mm_create_mat.php?id=<?= $row['vendor_id'] ?>" >
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