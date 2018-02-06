<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("Script/sd.php");
?>
			
<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Docment Flow</h2>
					</div>
					<div class="box-content"  	> 	
						<label for="usr">
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalinvoice">Find Customer</button>&nbsp;&nbsp;&nbsp;&nbsp;<h2>Order Number : <select name="Invoice" onchange="showCustomer(this.value)">
							<option value="">Order Number:</option>
							<option value="ALFKI">OD568</option>
							<option value="NORTS ">OD8954</option>
							<option value="WOLZA">OD7987</option>
							</select></h2> 
							<p></p>
							 </label> 	 
						<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable " >
									
						  <thead>
							  <tr>
								  <th>Document id</th>
								  <th>Document type</th>
								  <th>Refernce Document</th>
								  <th>Status</th>
								  <th>Document date</th>
								  <th>Print</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM document INNER JOIN doc_type USING(doc_type_id) ";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?= $row['doc_id'] ?></td>
								<td><?= $row['doc_description'] ?></td>
								<td>
									<?php 
										if($row['doc_type_id']==2)
										{	echo 'IN';	} 
										else if($row['doc_type_id']==3)
										{	echo 'QT';	} 
										else if($row['doc_type_id']==5)
										{	echo 'SO';	} 

									echo $row['ref_doc'] ?>
										

								</td>
								<td></td>
								<td><?= $row['doc_date'] ?></td>
								
								<td><a class="btn btn-info" href="invoice.php?uID=<?php echo $row['doc_id']; ?>">
										<i class="halflings-icon white print"></i>  
									</a>
<!--
									 <a class="btn btn-danger" onclick="return confirmDel()" href="CUD/delete_docflow.php?delID=<?php echo $row['doc_id'];?>">
										<i class="halflings-icon white expand"></i> 
									</a> </td>
-->
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
	
</div>

			</div><!--/row-->
<div class="modal fade bs-example-modal-lg" id="myModalinvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
								  <th>ID</th>
								  <th>Username</th>
								  <th>Email Address</th>
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
									<a class="btn glyphicon glyphicon-ok" href="sd_docflow.php">
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

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->