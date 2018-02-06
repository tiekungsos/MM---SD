<?php 	
     $doc_id=NULL;
    if(!empty($_GET))
    {
    	$doc_id=$_GET['uID'];
    }

					include("../includes/connection.php");
					$sql = "SELECT material_number,description,quantity,price,doc_date FROM (document JOIN inq_has_mat using(doc_id) ) join material using(material_number) where doc_id='$doc_id'";

					$sql2 = "SELECT material_number,
								description,
								quantity,
								price,
								doc_date,
								first_name,
								last_name,
								house_number,
								district,
								province,
								post_code,
								doc_type_id
					from ((document JOIN inq_has_mat using(doc_id) ) 
						 join material using(material_number)) 
                         join customer using(customer_id) 
					
					where doc_id='$doc_id' limit 1";

					$result=mysqli_query($connect,$sql); //rs.open sql,con
					$result2=mysqli_query($connect,$sql2);
					$result3=mysqli_query($connect,$sql2); //rs.open sql,con
					$result4=mysqli_query($connect,$sql2); //if else 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

	
	<?php $type_id = 0 ;?>
    <textarea id="header">
		<?php while ($row=mysqli_fetch_array($result4)) { 
			$type_id = $row['doc_type_id'];
	} 
				 if ($type_id == 1) {
    				echo "INQUIRY";} 
				else if ($type_id == 2) {
    				echo "QUOTATION";}
		else if ($type_id == 3) {
    				echo "SALE ORDER";}
		else if ($type_id == 4) {
    				echo "POST GOOD ISSUE";}
		else {
    				echo "INVOICE";}
			?>
		
		</textarea>
		
		<div id="identity">
		     <h3> ADDRESS</h3>
            <textarea id="address">
				<?php while ($row=mysqli_fetch_array($result3)) { 
               echo "\n"; 
			  echo $row['first_name']; echo '&nbsp;&nbsp;';
			   echo $row['last_name']; 
	          echo "\n House number";echo '&nbsp;&nbsp;';
			   echo $row['house_number']; echo "\n";
	 			echo " Districtr";echo '&nbsp;&nbsp;';
			   echo $row['district']; echo "\n";
				echo " Province";echo '&nbsp;&nbsp;';
				echo $row['province']; echo "\n";
	           echo " Post code";echo '&nbsp;&nbsp;';
				echo $row['post_code']; 
					}
                 ?></textarea> 
	
			
            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="logo" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
               <img id="image" src="images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

<!--            <textarea id="customer-title">S-TEACH COMPANY </textarea>-->

            <table id="meta">
                <tr>
                    <td class="meta-head"><?php  if ($type_id == 1) {
    				echo "Inquiry";} 
				else if ($type_id == 2) {
    				echo "Quotation";}
		else if ($type_id == 3) {
    				echo "Sale Order";}
		else if ($type_id == 4) {
    				echo "Post Good Issue";}
		else {
    				echo "Invoice";} ?></td>
					
                    <td><textarea><?php echo $doc_id ;?></textarea></td>
                </tr>
                <tr>
				<?php while ($row=mysqli_fetch_array($result2)) { ?>
                    <td class="meta-head">Date Create</td>
                    <td><textarea><?php echo $row['doc_date']; }?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Today date </td>
                    <td><textarea id="date"> </textarea></td>
                </tr>

            </table>
		
		</div>
			
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  <?php 
								
			    $sum = 0;
			$subtotal = 0;
			$Balance_due = 0;
				while ($row=mysqli_fetch_array($result)){
//					echo $row['material_number'];
		  ?>
			
		  <tr >
		      <td class="item-name"><div class="delete-wpr"><textarea><?php echo $row['material_number']; ?></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea><?php echo $row['description']; ?></textarea></td>
		      <td><textarea class="cost"><?php echo $row['price']; ?></textarea></td>
		      <td><textarea class="qty"><?php echo  $row['quantity']; ?></textarea></td>
			  <?php $sum = $row['price']*$row['quantity']; ?>
		      <td><span class="price"> <?php echo $sum; ?></span></td>
		  </tr>
		  
			
			
		 <?php  $subtotal = $subtotal+$sum; } ?>
		  
<!--
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
-->
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php echo "$" ;echo number_format($subtotal,2);?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total"><?php echo "$" ;echo number_format($subtotal,2);?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>
		      <td class="total-value"><textarea id="paid">$0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"><?php echo "$" ;echo number_format($subtotal,2);?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
	
</body>

</html>