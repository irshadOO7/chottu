 <?php 
use App\Models\ChottuModel;
?>
<style type="text/css">
  table,th,td {
  border: solid 1px grey !important;
  }
  
</style>
<?php 
  if(isset($_SESSION['selected_customer']) && $_SESSION['selected_customer']!=0){
    $customer_id = $_SESSION['selected_customer'];
    $model = new ChottuModel();
    $arr = array('status'=>'ACTIVE','id'=>$customer_id);
    $customer = $model->get_object('customer_details',$arr);
    $c_id = $customer->id;
    $c_moblie = $customer->mobile;
    $c_name = $customer->name;
    $c_email = $customer->email;
    $c_amount = $customer->amount;
    $c_city = $customer->city;
    $c_pincode = $customer->pincode;
    $c_addresss = $customer->address;
  }else
  {
    $c_moblie ='';
    $c_name ='';
    $c_email = '';
    $c_amount = '';
    $c_city = '';
    $c_pincode = '';
    $c_addresss = '';
    $c_id ='';
  }
?>
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>New Order</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Order</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
          <div class="col-9">
            <div class="card">
              <div class="card-body">
               <form action='add_product' method="post" id="frmproduct">
                <div class="form-group">
                 <!-- <label>Product</label> -->
             <select  name="product_id" class="form-control form-control-sm" onchange="submit();" id="product_id">
             <option value="">----select one----</option>
             <?php 
             $model = new chottuModel();
             $select1 = $model->select_all('product_details',"status='ACTIVE'");
             foreach ($select1 as $sl1) {
             ?>
             <option value='<?= $sl1['id']; ?>'><?= $sl1['name']; ?>[&#8377;<?= $sl1['rate']?>]</option>}
             <?php
             }
             ?>
             </select>
            </div>
          <!-- </div> -->
             <!--  <div class="col-9">
                <div class="card">
                  <div class="card-body"> -->
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-bordered" id="tb">
                        <thead>
                          <tr>
                            <th>Sr.No.</th>
                            <th>Product Name</th>
                            <th>MRP</th>
                            <th>Quantity</th>
                            <th>Dis. %</th>
                            <th>Amount</th>
                            <th class="text-center">Delete</th>
                          </tr>
                        </thead>
                        <tbody style="border: solid 1px grey;">
                          <?php $model = new chottuModel();
                          $invoice_id = $model->get_empty('invoice_details');
                                $arr = array('status'=>'ACTIVE','sale_id'=>$invoice_id);
                                $data = $model->select_all('tb_sale_item',$arr);
                          ?>
                         
                          <?php 
                          $i=1;
                          $qty=0;
                          $total_amount=0;
                          foreach ($data as $add) :
                             $product_id = $add['product_id'];  
                             $model = new chottuModel();
                             $product = $model->get_object('product_details',array('id'=>$product_id));
                             $data_row = json_encode($add);
                            ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $product->name; ?></td>
                            <td><input class="product_rate" id="<?= 'rate'.$i; ?>"  data-num="<?=$i ?>" type="number" style="width: 80px;" data-row='<?php echo $data_row; ?>' value="<?= $add['sale_rate']; ?>" min="0"></td>
                            <td><input class="product_qty" id="<?= 'qty'.$i;  ?>" data-num="<?=$i ?>" type="number" style="width: 50px;" value="<?= $add['product_qty']; ?>" min="1"></td>
                            <td><input class="product_discount" id="<?= 'discount'.$i; ?>"  data-num="<?=$i ?>" type="number" style="width: 80px;" value="<?= $add['product_discount']; ?>" min="0"></td>
                            <td><?= $add['product_amount']; ?></td>
                            <td><ul>
                               <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" onclick="delRow(this)" data-name='tb_sale_item' id='<?php echo $add['id'];?>' data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                             </li>
                          </ul></td>
                        </tr>
                          <?php 
                          $i++;
                          $qty=$qty+$add['product_qty'];
                          $total_amount=$total_amount+$add['product_amount'];
                        endforeach 
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th style="font-size: 15px;" colspan="3">Final Figure</th>
                            <th style="font-size: 15px;"><?= $qty ?></th>
                            <th style="font-size: 15px; text-align:right;" colspan="3">&#8377;<?= $total_amount ?></th>
                          </tr>
                        </tfoot>
                      </table>  
                    </div>
                  </form>
                  </div>
                </div>
               </div>
                   <div class="col-3">
                    <div class="card">
                       <h6 class="text-center bg-whitesmoke">Invoice Details</h6>
                     <div class="card-body">
                       <div class="form-group">
                         
                          <form method="post" id="customerForm">
                           <?php  ?>
                            <label class="text-justify"><h6><strong>Customer Details</strong></h6></label>
                            <div class="form-group ">
                              <label>Mobile no.</label>
                              <input type="text" name="mobile"  id='mobile' onkeyup="result(this)" class="form-control" value="<?= $c_moblie ?>" required="required">
                            </div>
                            <div class="form-group ">
                              <label>Name</label>
                              <input type="text" name="name"  id='name' class="form-control" value="<?= $c_name ?>" required="required">
                            </div>
                            <div class="form-group ">
                              <label>Email</label>
                              <input type="text" name="email"  id='email' class="form-control" value="<?= $c_email ?>" required="required">
                            </div> 
                           <!--  <div class="form-group ">
                              <label id="lb_amt">AMOUNT</label>
                              <input type="text" name="amount"  id='amount' class="form-control" required="required">
                            </div> --><!-- </div>
                               <div class="col-lg-6"> -->
                             <div class="form-group ">
                              <label>city</label>
                              <input type="text" name="city"  id='city' class="form-control" value="<?= $c_city ?>" required="required">
                            </div>
                            <div class="form-group ">
                              <label>PIN CODE</label>
                              <input type="text" name="pincode"  id='pincode' class="form-control" value="<?= $c_pincode ?>" required="required">
                            </div>
                            <div class="form-group ">
                              <label>ADDRESS</label>
                              <input type="text" name="address"  id='address' class="form-control" value="<?= $c_addresss ?>" required="required">
                            </div>
                            <div class="form-group">
                              <input type="hidden" class="form-control form-control-sm" id="status" name="status" value="ACTIVE">
                            </div>
                          </form>
                           <input type="hidden" id='dataId' name="id">
                            <div class="footer bg-whitesmoke br">
                              <button class="btn btn-primary btn-block" id="add_customer" data-frm='#customerForm'  data-tbl='customer_details' data-ctrl='update_now' onclick="saveData(this)" data-clean='no' value="Save">Add customer</button>
                        </div>
                      </div> 
                    </div>
                   </div> 
                  </div> 
                  <div class="col-12">
                    <div class="card">
                     <div class="card-body">
                      <div class="table-responsive">
                       <table class="table table-striped table-hover" id="">
                        <thead>
                          <tr>
                            <th>Invoice Amount</th>
                            <th>Discount %</th>
                            <th>Payable Amount</th>
                            <th>Paid Amount</th>
                            <th>Dues Amount</th>
                            <th>Invoice Date</th>
                            <th>Save & Continue</th>
                          </tr>
                        </thead>
                        <tbody>
                          <form action="close_inv" method="post" id="invoiceFrm">
                           <!--  <label><input type="checkbox" id="check_amount" value="<?= $c_amount ?>" onchange="cal()"> Dues/Advance:&#8377; <span class="badge badge-success"><?= $c_amount ?></span></label>&nbsp; -->
                          <tr class="col-3">
                            <td><input class="invoice_amount" name="inv_amt" id="<?= 'inv_amt' ?>" type="number" style="width: 100px; font-size: 15px;" value="<?= $total_amount ?>" readonly></td>
                            <td><input class="invoice_discount" name="inv_dis" id="<?= 'inv_dis' ?>" type="number" onkeyup='calcAmt()' style="width: 100px; font-size: 15px;" min="0"></td>
                            <td><input class="payable_amount" name="pay_amt" id="<?= 'pay_amt' ?>" type="number"  style="width: 100px; font-size: 15px;" readonly></td>
                            <td><input class="paid_amount" name="paid_amt" id="<?= 'paid_amt' ?>" type="number" onkeyup='calcAmt()' style="width: 100px; font-size: 15px;" min="0" required></td>
                            <td><input class="dues_amount" name="dues_amt" id="<?= 'dues_amt' ?>" type="number" style="width: 100px; font-size: 15px;" readonly></td>
                             <td>
                               <!-- <label class="text-justify"><h6><strong></strong></h6></label><br> -->
                                <input type="date" name="invoice_date"  id='invoice_date' required>
                             </td>
                                <input type="hidden" name="customer_id"  id='customer_id' value="<?= $c_id ?>" required>
                                <input type="hidden" name="status" id="status" value="ACTIVE">
                             <td><button type="submit" class="btn" id='btn' btn-primary btn-block" data-tbl='invoice_details' data-frm="invoiceFrm" onmouseover="frmvld()" onclick="submit()" value="Save">Save</button></td>
                          </tr>
                         </form>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>