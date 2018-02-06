<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread();

?>



 <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
	 
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart','line']});  
      </script>


<?php include("includes/connection.php");

								$sql = "SELECT doc_date,description,quantity,price
										from document join inq_has_mat using (doc_id) 
													  join material using (material_number); ";
								$result=mysqli_query($connect,$sql); //rs.open sql,con

								$sql2 = "select sum(price*quantity) as total 
												from document 
												join inq_has_mat using (doc_id) 
												join material using (material_number)
												group by description
												order by total desc
											";
								$result2=mysqli_query($connect,$sql2);

					            $sql3 = "SELECT description,sum(quantity) as qty
											  from document join inq_has_mat using (doc_id) 
											  join material using (material_number)
											  group by description";

								$result3=mysqli_query($connect,$sql3);//rs.open sql,con
								
								$sql4 = "select sum(price*quantity) as total 
											from document 
											join inq_has_mat using (doc_id) 
											join material using (material_number)";
								$result4=mysqli_query($connect,$sql4);
								
								$sql5 = "select CONCAT(first_name, ' ', last_name) as name  , customer_type_description as type , 		count(doc_type_id) as count
								from customer join customer_type using (customer_type_id)
											  join document using (customer_id)
								where doc_type_id = '1'
								group by first_name";
								$result5=mysqli_query($connect,$sql5);
							

?>
<?php while ($row=mysqli_fetch_array($result2))		{
	$number[]= $row['total'];
//	   echo $row['total']; 
//	echo '\n';
	
}	
while ($row=mysqli_fetch_array($result3))		{
	$name[]= $row['description'];
	$qty[]= $row['qty'];
//	echo $row['qty']; 
//	echo '\n';
}	



?>


<script>
var number =<?= $qty[0]?>;
var number2 =<?= $qty[1]?>;
var number3 =<?= $qty[2]?>;
var number4 =<?= $qty[3]?>;
var name ='<?= $name[0]?>';
var name2 ='<?= $name[1]?>';
var name3 ='<?= $name[2]?>';
var name4 ='<?= $name[3]?>';

google.charts.load('current', {
  callback: function () {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
      [name, number],
      [name2, number2],
      [name3, number3],
      [name4, number4],
  
    ]);
    var options = {
      title:'สัดส่วนของสินค้าที่ขายดี 4 อันดับแรก',
      width:500,
      height:300
    };

    for (var i = 0; i < 1; i++) {
      var container = document.getElementById('draw-charts').appendChild(document.createElement('div'));
      var chart = new google.visualization.PieChart(container);
      chart.draw(data, options);
    }
  },
  packages: ['corechart']
});
	
</script>

<script>
var number =<?= $number[0]?>;
var number2 =<?= $number[1]?>;
var number3 =<?= $number[2]?>;
var number4 =<?= $number[3]?>;
var name ='<?= $name[0]?>';
var name2 ='<?= $name[1]?>';
var name3 ='<?= $name[2]?>';
var name4 ='<?= $name[3]?>';

google.charts.load('current', {
  callback: function () {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'จำนวนเงินที่ขายได้');
    data.addRows([
      [name, number],
      [name2, number2],
      [name3, number3],
      [name4, number4],
  
    ]);
    var options = {
      title:'สัดส่วนของสินค้าที่ขายดี 4 อันดับแรก',
      width:500,
      height:300
    };

    for (var i = 0; i < 1; i++) {
      var container = document.getElementById('line-charts').appendChild(document.createElement('div'));
      var chart = new google.visualization.LineChart(container);
      chart.draw(data, options);
    }
  },
  packages: ['corechart']
});
	
</script>


<div class="row-fluid sortable">
	
  <div class="container">
	  <button type="button" class="btn btn-primary">New Tasks! <span class="badge">5 </span></button>
	  &nbsp;&nbsp;&nbsp;&nbsp;
	   <button type="button" class="btn btn-primary">New Orders!<span class="badge">20</span></button>
	  </div>
	<br><br><br>
		<div class="container">
				 <div class="box span6">
					<div class="box-header" data-original-title;>
						<h2><i class="fa fa-area-chart"></i><span class="break"></span>จำนวนการสั่งสินค้ารายวัน</h2>
					</div>
					<div class="box-content"  	> 
	
						
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Date</th>
								  <th>Product</th>
								  <th>Quantity</th>
								  <th>Price (Bath)</th>
								  <th>Sub-Total (Bath)</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php  $total_price =50;
							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['doc_date']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['quantity']; ?></td>
								<td><?php echo number_format($row['price'],2); ?></td>
							      <?php $total_price = $row['quantity']*$row['price']; ?>
								<td><?php echo number_format($total_price,2) ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>  
						
					 
					 </div></div> 
	
	<div class="box span6">
					<div class="box-header" data-original-title;>
						<h2><i class="fa fa-area-chart"></i><span class="break"></span>ปริมาณยอดขายที่เกิดขึ้น</h2>
					</div>
					<div class="box-content"  	> 
				<ul id="line-charts"></ul>
						
						
		</div>
		
		
	</div>
			<div class="box span6">
					<div class="box-header" data-original-title;>
						<h2><i class="fa fa-area-chart"></i><span class="break"></span>สัดส่วนสินค้าที่ขายดี</h2>
					</div>
			<div class="box-content"  	> 
						<ul id="draw-charts"></ul>
            <br>
			  <br>  <br>  <br>  <br>
		</div>
			</div>
	</div>
	

   
					<div class="container">
				 <div class="box span6">
					<div class="box-header" data-original-title;>
						<h2><i class="fa fa-area-chart"></i><span class="break"></span>ยอดขายที่เกิดขึ้น</h2>
					</div>
					<div class="box-content"  	> 	
          <!--  Bar Chart -->
            <div class="card-header">
              <i class=""></i> </div>
            <div class="card-body">
              <div class="row">
     
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                <div class="text-center ">
					<br>
                  <div class="text-primary"><?php $pofit = 0; while ($row=mysqli_fetch_array($result4))	{
												$pofit = $row['total'];
								echo "$";	echo number_format($row['total'],2) ;} ?> </div>
                  <div class="small text-muted">ยอดขายทั้งหมดที่เกิดขึ้น</div>
                  <hr>
                  <div class=" text-warning"><?php $pofit = $pofit*40/100; echo "$"; echo number_format($pofit,2) ;?></div>
                  <div class="small text-muted">กำไรสุทธิ</div>
					
                </div>
              </div>
            </div>        
          </div>
      
      </div>
						
						<div class="box span6">
					<div class="box-header" data-original-title;>
						<h2><i class="fa fa-area-chart"></i><span class="break"></span>ลูกค้าของเรา</h2>
					</div>
			<div class="box-content"  	> 
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>NAME</th>
								  <th>ระดับ</th>
								  <th>จำนวนคำสั่งซื้อ</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php  $total_price =50;
							while ($row=mysqli_fetch_array($result5))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['type']; ?></td>
								<td><?php echo $row['count']; ?></td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>  

			
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