<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
    //require_once("Script/sd.php");
    $custo_id=NULL;
    if(!empty($_GET))
    {
    	$custo_id=$_GET['id'];
    }
    include("includes/connection.php");
	$sql = "SELECT * FROM document WHERE doc_type_id = 1 ORDER BY doc_id DESC LIMIT 1";
	$result=mysqli_query($connect,$sql);
	$row=mysqli_fetch_array($result);
	$new_id=$row['doc_id']+1;
?>
<script language="javascript">
	function fncSubmit(strPage)
	{
	if(strPage == "page1")
	{
	document.form1.action="sd_inquery_display.php";
	}
	if(strPage == "page2")
	{
	document.form1.action="sd_inquery_display.php";
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
	<div class="box span12">
					<form action="sd_inquery.php" method="post">
						<div style="display: none">
							 
								 <input type="number" name="custo_id"  class="form-control"  value="<?= $custo_id ?>"  oninvalid="alert('โปรดเลือก Customer ');"  required >
							 </div>
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Find Customer</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"> 
						<?php   
								include("includes/connection.php");
								$sql3 = "SELECT * FROM customer WHERE customer_id = '$custo_id'";
								$result3=mysqli_query($connect,$sql3);
								$row3=mysqli_fetch_array($result3);
						?>
						 <div class="form-group">
							 <br>
							 <label>	  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalcustomer">Find Customer</button>  <input type="text" name="custo_id" value="<?= $custo_id ?>"   class="form-control" disabled> <input type="hidden" name="custo_id" value="<?= $custo_id ?>"  > </label> <p></p> 
							<label>Name &nbsp; &nbsp; :<input type="text" name="customer"  class="form-control"  value="<?= $row3['first_name'].' '.$row3['last_name'] ?>" disabled></label>  
							<label>Address :  <input type="text" name="customer"  class="form-control"  value="<?= $row3['house_number'].' '.$row3['district'].' '.$row3['province'] ?>" disabled></labeL>  
						</div>
						<p></p>
						<p></p>
					</div>
					
						
					</div>
		   	
						<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Create Inquiry</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content"> 
						
						 <div class="form-group">
							 <br>

							 <label for="usr">Create Inquiry Number : <input type="number" name="inq_number" value="<?= $new_id ?>" class="form-control" disabled >
							&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="inq_number" value="<?= $new_id ?>">
							
							 <button type="submit" class="btn btn-primary btn-lg" >Submit</button>  
								 
							 </label>  
						</div>
						<p></p>
						<p></p></div>			
					</div>
				</form>
				<form action="sd_inquery_display.php" method="post">
					<div style="display: none">
							 
								 <input type="number" name="custo_id"  class="form-control"  value="<?= $custo_id ?>"  oninvalid="alert('โปรดเลือก Customer ');"  required >
							 </div>
						<input type="hidden" name="custo_id" value="<?= $custo_id ?>">
						<div class="box span12">
					<div class="box-header" data-original-title;>
						<h2><i class="icon-file white user"></i><span class="break"></span>Find Inquiry</h2>
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
  								<label for="sel1">Inquiry List:</label>
  									<select name="inq_number" onchange="showCustomer(this.value)">
								<?php
									include("includes/connection.php");

									$sql2 = "SELECT * FROM document WHERE customer_id = '$custo_id'&& doc_type_id=1 ";
									$result2=mysqli_query($connect,$sql2); //rs.open sql,con

								while ($row=mysqli_fetch_array($result2))
								{ ?><!--open of while -->
									<option value="<?= $row['doc_id'] ?>"><?= $row['doc_id'] ?></option>
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
									<a class="btn glyphicon glyphicon-ok" id="add_customer" href="before_inq.php?id=<?= $row['customer_id'] ?>" >
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