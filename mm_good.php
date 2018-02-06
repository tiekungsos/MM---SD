<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
		get_bread_five();
?>
	<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Good receipt</h2>
					</div>
					<div class="box-content"  	> 	
						<label for="usr">
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalinvoice">Purchase order</button>&nbsp;&nbsp;&nbsp;&nbsp;
							
							<br><br>
							<div class="form-group">
  								<label for="usr">Vendor Id:</label>
  								<input type="text" class="form-control" id="usr" placeholder="V54686" disabled>&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text" class="form-control" id="usr" placeholder="Acer" disabled>
							</div>
							
							<div class="form-group">
  								<label for="usr">Purchase order Id:</label>
  								<input type="text" class="form-control" id="usr" placeholder="PR15646" disabled>
							</div>

							
							<br>			
							 <a href="mm_good_next.php" class="btn btn-primary" role="button">Copy to Good receipt </a>
							 </label> 	 
						
				</div>
					</div>
			
			</div><!--/row-->

<div class="modal fade bs-example-modal-lg" id="myModalinvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Find Purchase order</h4> 
      </div>
      <div class="modal-body">
		  
		  <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th> </th>
								  <th>ID</th>
								  <th>Vendor Id</th>
								  <th>Actions</th>
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
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['Username']; ?></td>
								<td><?php echo $row['Email']; ?></td>
								<td class="center">
									<a class="btn glyphicon glyphicon-ok" href="mm_good.php">
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

<?php
	get_footer();
?>		
