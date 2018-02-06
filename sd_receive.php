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
						<h2><i class="icon-file white user"></i><span class="break"></span> Receive Payment </h2>
					</div>
					<div class="box-content"  	> 
		
						<p></p>
						 <label for="usr">
						<h2>Payment number : RE125868</h2>
						<h2>Document Date : 06-11-2017</h2>
						<p> </p>
						<p> </p>
						</label>
						<p></p>
						<p></p>
						 <div class="form-group">
							 <label for="usr">
								<h2>Header</h2>
							     
								 <form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" >Payer: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" placeholder="Pay586486" disabled> 
		<input class="form-control" id="disabledInput" type="text" placeholder="นายธนพล พฤกทาน" disabled> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Sale order: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div class="col-sm-10"> 
		<input class="form-control" id="disabledInput" type="text" placeholder="So5685489" disabled>
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2" >Invoice: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div class="col-sm-10"> 
		<input class="form-control" id="disabledInput" type="text" placeholder="in5685489" disabled>
    </div>
  </div>
<div class="form-group">
    <label class="control-label col-sm-2" >Po number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div class="col-sm-10"> 
		<input class="form-control" id="disabledInput" type="text" placeholder="po584586" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Po Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="form-control" id="disabledInput" type="text" placeholder="06-11-2017" disabled>
    </div>
  </div>

	 <div class="form-group">
    <label class="control-label col-sm-2" >Billing Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <div class="col-sm-10"> 
		<input class="form-control" id="disabledInput" type="text" placeholder="06-11-2017" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Net Value: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="form-control" id="disabledInput" type="text" placeholder="1000000" disabled>
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
								  <th>Discount(%)</th>
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
							 <a href="sd_receive_pre.php" class="btn btn-info" role="button">Black</a>
							 <a href="sd_receive_pre.php" class="btn btn-info" role="button" id="submit">Submit</a>
						</div>
						<script>
					$(document).ready(function(){
    				$("#submit").click(function(){
								alert("The Payment has been sent successfully.");
    				});
					});
</script>
						
				</div>
					</div>
			
			</div><!--/row-->

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