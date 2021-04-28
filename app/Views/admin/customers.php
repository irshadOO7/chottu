<?php 
use App\Models\ChottuModel;
?> 
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Customers</h1>
             <div class="" style="margin-left: 20px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='customer_details'data-frm='#customersForm' onmouseover="cleanData(this)" onclick="generateRow(this)">ADD NEW</button>
                  </div>
                 <!--  <div class="" style="margin-left: 20px;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orderModal" data-name='order_details' data-frm='#orderForm' onmouseover="cleanData(this)" onclick="generateRow(this)">ORDER</button>
                  </div> -->
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Customers</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>MOBILE NO.</th>
                            <th>CRREATED AT</th>
                             <th>ACTION</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($customer) : ?> 
                          <?php foreach ($customer as $cus) : ?>
                          <tr> 
                            <td><?= $cus['name']; ?></td>
                            <td><?= $cus['email']; ?></td>
                            <td><?= $cus['mobile']; ?></td>
                            <td><?= date('d-M-Y h:i a', strtotime($cus['created_at'])); ?></td>
                            <td> <ul class="list-inline m-0">
                                   <li class="list-inline-item">
                                     <button class="btn btn-success btn-sm rounded-0" data-frm='#customersForm' data-modal='#centerModal' onclick="editRow(this)" data-row='<?php echo json_encode($cus);?>' type="button" data-toggle="" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </li>
                                    <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="" onclick="delRow(this)" data-name='customer_details' id='<?php echo $cus['id'];?>' data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
              <div class="modal fade" id="centerModal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Customres Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             <!--    Modal Content... -->
              <form  method="post" enctype="multipart/form-data" id="customersForm">
             <div class="row">
              <div class="col-lg-6">
          <div class="form-group ">
            <label>Name</label>
            <input type="text" name="name"  id='name' class="form-control" required="required">
          </div>
          <div class="form-group ">
            <label>Email</label>
            <input type="text" name="email"  id='email' class="form-control" required="required">
          </div> 
          <div class="form-group ">
            <label>Mobile no.</label>
            <input type="text" name="mobile"  id='mobile' class="form-control" required="required">
          </div>
          <div class="form-group ">
            <label>AMOUNT</label>
            <input type="text" name="amount"  id='amount' class="form-control" required="required">
          </div></div>
             <div class="col-lg-6">
           <div class="form-group ">
            <label>city</label>
            <input type="text" name="city"  id='city' class="form-control" required="required">
          </div>
          <div class="form-group ">
            <label>PIN CODE</label>
            <input type="text" name="pincode"  id='pincode' class="form-control" required="required">
          </div>
          <div class="form-group ">
            <label>ADDRESS</label>
            <input type="text" name="address"  id='address' class="form-control" required="required">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control form-control-sm" id="status" name="status" value="ACTIVE">
          </div>
          <!-- <div class="form-group">
            <label>Brand Logo</label>
            <input type="file" name="photo" id="file" onchange="uploadData(this)" class="form-control" required="required">
          </div> -->
        </form>
      </div>
   </div>
  <!-- </div> -->
        <div class="modal-footer bg-whitesmoke br">
        <input type="hidden" id='dataId'>
                <button type="button" name="submit" data-frm='#customersForm'  data-tbl='customer_details' data-ctrl='update_now' onclick="saveData(this)" value="Save" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div> 
      </div>
