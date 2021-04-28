<?php
use App\Models\chottuModel;
?>
  <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Sales_Report</h1>
           <!--  <div class="" style="margin-left: 20px">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='brand' data-frm='#brandForm' onmouseover="cleanData(this)" data-imgshow='#dispPhoto'  onclick="generateRow(this)">ADD NEW</button>
            </div> -->
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Sales_Report</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='brand' data-frm='#brandForm' onmouseover="cleanData(this)" data-imgshow='#dispPhoto'  onclick="generateRow(this)">ADD NEW</button>
                  </div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>INVOICE N0.</th>
                            <th>CUSTOMER NAME</th>
                            <th>PAYABLE AMOUNT</th>
                            <th>DISCOUNT %</th>
                            <th>PAID AMOUNT</th>
                            <th>DUES AMOUNT</th>
                            <th>INVOICE DATE</th>
                             <th style="width: 80px">ACTION</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($inv_details) : ?> 
                          <?php foreach ($inv_details as $inv) : 
                            $customer_id = $inv['customer_id'];
                            $model = new ChottuModel();
                            $customer = $model->get_object('customer_details',array('id' =>$customer_id));
                            ?>
                          <tr>
                            <td>CT1000<?= $id = $inv['id']; ?></td>
                            <td><?= $customer->name; ?></td>
                            <td><?= $inv['inv_amt']; ?></td>
                            <td><?= $inv['inv_dis']; ?></td>
                            <td><?= $inv['paid_amt']; ?></td>
                            <td><?= $inv['dues_amt']; ?></td>
                            <td><?= date('d-M-Y h:i a', strtotime($inv['created_at'])); ?></td>
                            <td> <ul class="list-inline m-0">
                                  <!--  <li class="list-inline-item">
                                    <button  class="btn btn-success btn-sm rounded-0" type="button"  title="View"><i class="fa fa-eye"></i></button>
                                   </li> -->
                                  
                                   <li class="list-inline-item">
                                    <a class="btn btn-success btn-sm rounded-0" type="button" href="<?php echo base_url();?>/admin/inv?inv_id=<?php echo $id;?>"  target='_blank' title="View" style="height: 30px;"><i class="fa fa-eye"></i></a>
                                   </li>
                                 <!--   <li class="list-inline-item">
                                     <button class="btn btn-success btn-sm rounded-0" data-frm='#invoiceForm' data-img='brand_photo' data-imgshow='#dispPhoto' data-modal='#centerModal' onclick="editRow(this)" data-row='<?php //echo json_encode($sale);?>' type="button" data-toggle="" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </li> -->
                                   <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="" onclick="delRow(this)" data-name='invoice_details' id='<?php echo $inv['id'];?>' data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </li>
                            </ul></td>
                          </tr>
                          <?php endforeach ?>
                          <?php endif ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </section>