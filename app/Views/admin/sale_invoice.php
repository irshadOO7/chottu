<?php
use App\Models\ChottuModel;

$s_id =$_GET['inv_id'];
// $inv_data = get_data('tb_sale',$s_id,null,'sale_id')['data'];
// $customer_data = get_data('tb_customer',$inv_data['customer_id'],null,'customer_id')['data'];
// $item_data = get_all('tb_sale_item','*',array('sale_id'=>$s_id))['data'];
// $item_count = get_all('tb_sale_item','*',array('sale_id'=>$s_id))['count'];
// $branch =  get_data('tb_user',$_SESSION['user_id'],'branch','user_id')['data'];
$model = new chottuModel();
$arr = array('status'=>'ACTIVE','id'=>$s_id);
$inv_data = $model->get_object('invoice_details',$arr);
// print_r($inv_data);
$inv_amt = $inv_data->inv_amt;
$inv_dis = $inv_data->inv_dis;
$pay_amt = $inv_data->pay_amt;
$paid_amt = $inv_data->paid_amt;
$dues_amt = $inv_data->dues_amt;
$inv_date = $inv_data->invoice_date;
$customer_id = $inv_data->customer_id;
$customer = $model->get_object('customer_details',array('id'=>$customer_id));
$id = $inv_data->id;
// $arr = array('sale_id'=>$id);
$sale_items = $model->select_all('tb_sale_item',array('sale_id'=>$id));
// $product_id = $sale_items['product_id'];

//$id = $sale_details['id'];
// $sale = $model->get_object('tb_sale_item',array('id'=>$sale_id));
  // print_r($sale_items);
// //echo "<pre>";
// //print_r($inv_data);
// //print_r($item_data);
// $gst0=0;
// $gst5=0;
// $gst12=0;
// $gst18=0;
// $gst28=0;
?>
<style>
	.low-margin{
		margin: 3px;
	}
.gst-table td{
	font-size: 13px;
	/* border: solid 1px #ddd; */
}
.item-list{
height: 700px;
width: 100%;
}
.item-list tr{
	height: 1;
}
.item-list tr:last-child{
	height: auto !important;
}
.item-list td{
	border-right: solid 1px #777;
	vertical-align: top;
	padding: 3px;
}
body{font-family:calibri;}
@media print{@page {size: portrait}}

</style>
<body onLoad="setTimeout('window.close()', 555000)">
<script type="text/javascript" src="assets/js/towords.js"></script>
<table rules='all' align='center' width='900px' align='left' border='1' cellspacing='0' cellpadding='4px' id='print_invoice'>
	<thead>
		<tr>
			
			<td colspan='6'>
			    <!-- <img src='assets/img/logo.png' alt='<?php //echo $inst_name; ?>' height='45px' hspace='15px'><br> -->
			     <center>
			    <h1 class="low-margin" style="font-size: 40px"><?php// echo strtoupper($inst_name);?></h1>
			    <?php 
			    //if($branch=='branch1'){
			    ?>
			   
				<strong><?php //echo strtoupper($inst_address1);?></br>
				    	<?php //echo $area1.$inst_district." - ".$pin1;?></strong><br>
				    	<strong>Phone No.</strong> <?php //echo $inst_contact1;?>, <strong>Mob.</strong> <?php //echo $customer->mobile;?>
			    <?php// } else {?>
			    	<strong><?php //echo strtoupper($inst_address2);?><?php //echo strtoupper($area2);?></br>
				    	<?php //echo $near. " - ".$pin2;?></strong><br>
				    	<strong>Phone No.</strong> <?php //echo $inst_contact1;?>, &nbsp; &nbsp;  <strong>Mob.</strong> <?php //echo $inst_contact2;?>
			    <?php// }?>
			</center>
			    <br>
			    <!-- <span styl='float:left'><b>GSTIN </b> : <?php //echo $inst_gst_no;?></span>  -->
			    <span style="margin-left: 20px"> <b>State</b> : BIHAR</span>
			    <span style="margin-left: 20px"> <b>Code</b> : 10</span>
			</td>
		</tr>
		<tr>
			<td colspan='2' align='left' valign='top'>
				<!-- <h4> M/s COUNTER SALE </h4> -->
				<b><?php //echo $customer_data['customer_name']; ?></b><br>
				<small><?php //echo $customer_data['customer_address']; ?><br></small>
				<!-- GSTIN :  <b><?php //echo $customer_gst= $customer_data['customer_gst']; ?></b><br> -->
				
				<b>Mobile No.</b> : <?php echo $customer->mobile; ?><br>
				<!-- <b>Due Date </b>:  -->
				
			</td>
			<td colspan='4' align='center' valign='top'>
				<h4> INVOICE DETAILS </h4>
				Invoice No. : <b><?php echo 'CT1000'.$id ?></b><br>
				Invoice Date : <b><?php echo date('d-M-Y',strtotime($inv_date)); ?></b></span><br>
				
			</td>
		</tr>
	</thead>
	<tbody>
	<td colspan='5' valign='top' height='700px' style="padding: 0px">
		<table class="item-list" rules="all">
		<tr bgcolor='#d2d2d2'>
				<td width="50px"> Sr. No.</td>
				<td> Particular / Product</td>
				<!-- <td> HSN </td> -->
				<td align='center'> Quantity</td>
				<td align='right'> Rate</td>
				<td width="70px">&nbsp;  Dis. (%) </td>
				
				<!-- <td align='right'> Amount</td> -->
				<!-- <td width="70px">&nbsp;  GST (%)</td> -->
				<td align='center'>Total </td>

		</tr>
		
		<?php 
			 $i=1;
			 $tqty =0;
			 $tamt =0;
			// $gtotal=0;
			// $tgst=0;
			// $gst_list = array();
			//if($item_count >0)
			//{
				foreach($sale_items as $item) :
					$product_id = $item['product_id'];
					// $model = new chottuModel();
					$product = $model->get_object('product_details',array('id'=>$product_id));
		        
				 //    print_r($item);
				      $tqty =$tqty+ $item['product_qty'];
					
					// // $gst_per = get_data('tb_product',$item['product_id'],'product_gst','product_id')['data'];
					//  $discount = ($item['product_rate']*$item['product_discount'])/100;
					//  $discount_rate = $item['product_rate']-$discount;
				

					//  $sale_amount = $item['sale_rate']*$item['product_qty'];
					//  $tamt =$tamt+ $sale_amount;

					// $gst_amt = $item['product_gst'];
					// $tgst =$tgst+ $gst_amt;
					
					// $gtotal = $gtotal+$item['product_amount'];
					
				
					// $gst_list[] = $item['gst_per'];
					// $item_gst = intval($item['gst_per']);
					// if($item_gst==0){
					// 	$gst0= $gst0+$gst_amt;
					// }else if($item_gst==5){
					// 		 $gst5=$gst5+$gst_amt;
					// }else if($item_gst==12){
					// 	$gst12= $gst12+$gst_amt;
					// }else if($item_gst==18){
					// 	$gst18 = $gst18+$gst_amt;
					// }else if($item_gst==28){
					// 	$gst28 = $gst28+$gst_amt;
					// }
					 echo "<tr>"; 
					 echo "<td align='center'>". $i ."</td>";
					 echo "<td>".$product->name ."</td>";
					 //echo "<td> ". get_data('tb_product',$item['product_id'],'product_hsn','product_id')['data'] ."</td>";
					
					 echo "<td align='center'>".$item['product_qty'] ."</td>";
					 echo "<td align='right'>". $item['sale_rate']."</td>";
					 echo "<td align='right'>". $item['product_discount'] ."</td>";

					 echo "<td align='right'>".number_format($item['product_amount'],2)."</td>";
					// echo "<td align='right'>".$item['gst_per']."</td>";
					// echo "<td align='right'>".  ."</td>";
					 echo "</tr>";
			 	$i++;
			 
			// }
		endforeach
		?>
		
		</table>
	</td>
	<tbody>
	<tfoot>
		<tr>
			<td colspan='3'>
					<!-- <h4 class="low-margin" align="center">GST Details </h4> -->
					
		        	<table class="gst-table" style='' width="100%">
		        		<thead>
		        			<!-- <tr bgcolor="#d2d2d2"> -->
		        				<!-- <th align="middle" rowspan='2'> GST %</th> -->
		        				<?php 
		        				// foreach ($gst_list as $gst_name) {
		        				?>
		        				<!-- <th align="center">SGST</th>
		        				<th align="center">CGST</th>
		        				<th align="center">IGST</th> -->
								<?php //}?>
		        			<!-- </tr> -->
		        		</thead>
		        		<tbody>
		        			
		        			<!-- <tr bgcolor="#d2d2d2"> -->
		        				<!-- <th></th> -->
		        				<?php 
		        				// $gst_type = substr($customer_gst,0,2);
		        				// $gst_list = array_unique($gst_list);
		        				// sort($gst_list);
		        				// foreach ($gst_list as $g_head) {
		        				// 	if($gst_type==10 or $gst_type=='')
		        				// 	{
		        				// 		for($i=0;$i<=2;$i++)
		        				// 		{
		        				// 			if($i==2)
		        				// 			{
		        				// 				$gst_val = $g_head;
		        				// 			}
		        				// 			else 
		        				// 			{
		        				// 				$gst_val = (intval($g_head)/2);
		        				// 			}
		        				// 			//echo "<th>".$gst_val."</th>";
		        				// 		}
		        				// 	}
		        				// 	else 
		        				// 	{
		        				// 		//echo "<th colspan='3'>".intval($g_head)."</th>";
		        				// 		for($i=0;$i<=2;$i++)
		        				// 		{
		        				// 			if($i==2)
		        				// 			{
		        				// 				$gst_val = $g_head;
		        				// 			}
		        				// 			else 
		        				// 			{
		        				// 				$gst_val = (intval($g_head)/2);
		        				// 			}
		        				// 			//echo "<th>".$gst_val."</th>";
		        				// 		}
		        				// 	}
		        				// }
		        				?>
		        			<!-- </tr> -->
		        			<tr>
		        				<!-- <th align="right">&#8377; </th> -->
		        				<?php 
		        				//foreach ($gst_list as $gst_name) {

		        					// $var_name = 'gst'.intval($gst_name);
		        					// if($gst_type==10 or $gst_type=='')
		        					// {
			        				// //echo "<td align='center'>".round(($$var_name/2),2)."</td>";
			        				// //echo "<td align='center'>".round(($$var_name/2),2)."</td>";
			        				// //echo "<td align='center'>0</td>";
		        					// }else {	
			        				// //echo "<td align='center'>0</td>";
			        				// //echo "<td align='center'>0</td>";
			        				// //echo "<td align='center'>".round(($$var_name),2)."</td>";
		        					// }
								// }?>
		        			</tr>
		        		</tbody>
		        	</table>
				<b> Total Quantity : <?php echo $tqty; ?> </b>
			</td>
			
			<td colspan='2' align='right' >
				Grand Total :<b><?php echo $pay_amt; ?><br></b>
				Total Discount :<b><?php echo $inv_dis; ?><br></b>
				<!-- GST Total :<b><?php //echo round($tgst,2); ?><br></b> -->
				<b> Payable Amount :<b><?php echo $pay_amt; ?><br></b>
				<?php 
				// if( $inv_data['inv_discount'] >0)
				// {
				//     $dis_per = round(($inv_data['inv_discount'] /$net_amount)*100,2);
				//echo " <span style='color:green'> Discount : (".$dis_per." % ) ". $inv_data['inv_discount'] ."</span>";
				//} ?>
				<br><b> Paid Amount :<?php echo $paid_amt; ?> </b><br>
	            <b> Advance Dues :<?php echo $dues_amt; ?> </b>
				<?php 
				// if( $inv_data['inv_dues'] <>0)
				// {
				// 	echo "<span style='color:red'> Dues/Advance : " .$inv_data['inv_dues'] ."</span>";
				// } ?>
				
			</td>
		</tr>
		<tr>
		   <td colspan='4' style='text-transform:capitalize' >
			<script> var words =toWords(<?php //echo $inv_data['inv_paid'];?>); document.write("<div class='t'><b>In Words : </b>"+words+" rupees only </div>"); </script>
			</td>
		</tr>
		<!-- <tr>
		    <td colspan='4' align='center'>
		        <b>
		        Account Name: <?php //echo $inst_name; ?> |
		        IFS Code: <?php //echo $ifsc_code; ?> |
		        A/c No.: <?php //echo $ac_no; ?>
		        </b>
		    </td>
		</tr> -->
		<tr>
		    <td colspan='4'>
		        <div class="well" style="width:100%;">
		        	<strong>Remarks : </strong>
		        	<ol>
		        		<li>Payment Terms : Within 7 days from invoice date.</li>
		        		<li>Payment by A/c Payee Cheques/CoD only.</li>
		        		<!-- <li>Goods Once sold will not be taken back.</li> -->
		        		<li>All disputes subect to <b>BIHAR</b></li>
		        		<!-- <li>Alder 5 years, Verritas, Damro, Piyestra 3 years, warranty ghun nahi lagne ki , Sangam 10 years lock/paint ki warranty</li> -->
		        	</ol>
             			<?php 
             			//if($inv_data['remarks']!=''){
             				//echo " &nbsp; &nbsp; &nbsp; * ".$inv_data['remarks'];
             			//}
             			?>
                </div>
		    </td>
		</tr>
		<tr>
			<td colspan='5' align='center'> 
				<!-- <a href='sale_invoice.php?sale_id=<?php //echo $s_id;?>&print=true' target='_blank' class='btn btn-success btn-sm' >PRINT </button> -->
					<div style="width:400px;margin-left: 500px">
						<strong>
								E. & O. E. 	<br>
								For <?php //echo strtoupper($inst_name);?>
						</strong>
					</div>
				</td>
	</tfoot>

</table>
<?php if(isset($_GET['print'])) {
	echo "<script> window.print() </script>";
}
?>
</body>