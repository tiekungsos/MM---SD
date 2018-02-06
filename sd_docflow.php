<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("Script/sd.php");
    $custo_id='customer name';
    if(!empty($_GET))
    {
    	$custo_id=$_GET['id'];
    }
?>
			
<div class="row-fluid sortable">		
				 <div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Document Flow</h2>
					</div>
					<div class="box-content"  	> 	
						<?php   
								include("includes/connection.php");
								$sql3 = "SELECT * FROM customer WHERE customer_id = '$custo_id'";
								$result3=mysqli_query($connect,$sql3);
								$row3=mysqli_fetch_array($result3);
						?>
						<label for="usr">
								
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalcustomer">Find Customer</button>&nbsp;&nbsp;&nbsp;&nbsp;

								
							<p></p>
							 </label> 
							 <label>
							 	Customer number: 
								<input type="text" name="" placeholder="<?php echo $custo_id; ?>">
							 	 </label>
							 <label>
							 	Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="" placeholder="<?php echo $row3['first_name'].' '.$row3['last_name']; ?>">
							 </label>
							 	 
						<label for="usr">
								<table class="table table-striped table-bordered bootstrap-datatable datatable " >
									
						  <thead>
							  <tr>
								  <th>Document id</th>
								  <th>Document type</th>
								  <th>Reference Document</th>
						
								  <th>Document date</th>
								  <th>Print</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM document INNER JOIN doc_type USING(doc_type_id) WHERE customer_id = '$custo_id'";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?= $row['doc_id'] ?></td>
								<td><?= $row['doc_description'] ?></td>
								<td>
									<?php 
										if($row['doc_type_id']==2)
										{	echo '';	} 
										else if($row['doc_type_id']==3)
										{	echo 'QT';	} 
										else if($row['doc_type_id']==5)
										{	echo 'SO';	} 

									echo $row['ref_doc'] ?>
										

								</td>
							
								<td><?= $row['doc_date'] ?></td>
								<td ><span <?php if($row['doc_type_id']==1){ echo 'hidden'; }?>><a hidden class="btn btn-info" href="print/Editable/invoice.php?doc=<?= $row['doc_id'] ?>&&uID=<?php echo $row['ref_doc']; ?>&&cus=<?= $custo_id ?>" >
										<i class="halflings-icon white print"></i>  
									</a></span>
									<!-- <a class="btn btn-danger" onclick="return confirmDel()" href="CUD/delete_docflow.php?delID=<?php echo $row['doc_id'];?>">
										<i class="halflings-icon white expand"></i> 
									</a> --></td>
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
								  <th>Customer number</th>
								  <th>Customer name</th>
								  <th>Address</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql2 = "SELECT * FROM customer ";
								$result2=mysqli_query($connect,$sql2); //rs.open sql,con

							while ($row=mysqli_fetch_array($result2))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['customer_id']; ?></td>
								<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
								<td><?php echo $row['house_number'].' '.$row['district'].' '.$row['province']; ?></td>
								<td class="center">
									<a class="btn glyphicon glyphicon-ok" id="add_customer" href="sd_docflow.php?id=<?= $row['customer_id'] ?>" >
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