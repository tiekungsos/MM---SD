<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
		get_bread_five();
?>
	<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>purchasing request</h2>
					</div>
					<div class="box-content"  	> 
						
							 <div class="form-group">
    					<label class="control-label col-sm-2" >Purchasing request Number: </label>
    						<div class="col-sm-10">
      						<input class="form-control" id="disabledInput" type="text" placeholder="PR586486" disabled> 
    						</div>
  							</div>
						
						<div class="form-group">
    					<label class="control-label col-sm-2" >Vendor Number : </label>
    						<div class="col-sm-10">
      						<input class="form-control" id="disabledInput" type="text" placeholder="VN586486" disabled> 
								&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="form-control" id="disabledInput" type="text" placeholder="ASUS" disabled> 
    						</div>
  						</div>
						
						<div class="form-group">
    					<label class="control-label col-sm-2" >Sub Total : </label>
    						<div class="col-sm-10">
      						<input class="form-control" id="disabledInput" type="text" placeholder="50000" disabled> 
    						</div>
  							</div>
						<div class="form-group">
    					<label class="control-label col-sm-2" >Total : </label>
    						<div class="col-sm-10">
      						<input class="form-control" id="disabledInput" type="text" placeholder="60000" disabled> 
    						</div>
  							</div>
							
				
						
								 
						<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
						  <thead>
							  <tr>
								  <th>Material ID</th>
								  <th>Description</th>				
								  <th>Price</th>
								   <th>quantity</th>
								  <th>Total Price</th>
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
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
							 </label> 
						
				</div>
					</div>
			
			</div><!--/row-->


	


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