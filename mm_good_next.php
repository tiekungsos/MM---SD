<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
		get_bread_five();
?>
	<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span> Good receipt</h2>
					</div>
					<div class="box-content"  	> 
		
						<p></p>
						 <label for="usr">
						<h2>Good receipt Number : GR125868</h2>
						<h2>Document Date : 06-11-2017</h2>
						<p> </p>
						<p> </p>
						</label>
						<p></p>
						<p></p>
						 <div class="form-group">
							 <label for="usr">
						
							     
								 <form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" >RP Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" placeholder="RFQ586486" disabled> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Vendor Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div class="col-sm-10"> 
		<input class="form-control" id="disabledInput" type="text" placeholder="V58546" disabled>
		<input class="form-control" id="disabledInput" type="text" placeholder="Acer" disabled> 
    </div>
  </div>

									 
</form>
							 </label> 
							 							 <h2>Item Overview</h2>
							<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th></th>
								  <th>Material number</th>
								  <th>Description</th>
								  <th>Quantity</th>
								  <th>Unit type</th>
								  <th>Price</th>
								  <th>Dalivery date</th>
								  <th>Amount</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM tblusers ORDER BY Firstname";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
							 <a href="mm_good.php" class="btn btn-info" role="button">Black</a>
							 <a href="mm_good.php" class="btn btn-info" role="button" id="submit">Submit</a>
						</div>
						<script>
					$(document).ready(function(){
    				$("#submit").click(function(){
								alert("The Good Receipt has been sent successfully.");
    				});
					});
</script>
						
				</div>
					</div>
			
			</div><!--/row-->
<?php
	get_footer();
?>		
