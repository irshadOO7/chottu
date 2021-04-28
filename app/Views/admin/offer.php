<?php 
use App\Models\chottuModel;
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Offer</h1>
             <div class="" style="margin-left:20px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='offer'data-frm='#offerForm' onmouseover="cleanData(this)" onclick="generateRow(this)">ADD NEW</button>
                  </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Offer</a></div>
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
                            <th>PRODUCT</th>
                            <th>REAL PRICE</th>
                            <th>OFFER PRICE</th>
                            <th>STATUS</th>
                            <th>CRREATED AT</th>
                             <th>ACTION</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($offer) : ?> 
                          <?php foreach ($offer as $off) : 
                            $product_id = $off['product_id'];
                                $model = new chottuModel();
                                $product = $model->get_object('product_details',array('id'=>$product_id));
                            ?>
                          <tr> 
                          <td><?= $product->name; ?></td> 
                            <td><?= $product->rate; ?></td>
                            <td><?= $off['offer_price']; ?></td>
                            <td><?= $off['status']; ?></td>
                            <td><?= date('d-M-Y h:i a', strtotime($off['created_at'])); ?></td>
                            <td> <ul class="list-inline m-0">
                                   <li class="list-inline-item">
                                     <button class="btn btn-success btn-sm rounded-0" data-frm='#offerForm' data-modal='#centerModal' onclick="editRow(this)" data-row='<?php echo json_encode($off);?>' type="button" data-toggle="" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </li>
                                    <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="" onclick="delRow(this)" data-name='offer' id='<?php echo $off['id'];?>' data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
          <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add_Offer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             <!--    Modal Content... -->
             <div class="row">
              <div class="col-lg-12">
                <form  method="post" enctype="multipart/form-data" id="offerForm">
          <div class="form-group ">
            <label>PROCUT NAME</label>
            <select type="text" name="product_id"  id='product_id' class="form-control" required="required">
              <option value="">----select one----</option>
              <?php 
              $model = new chottuModel();
              $select = $model->select_all('product_details',"status='ACTIVE'");
              foreach ($select as $sl) {
                ?>
              <option value='<?= $sl["id"]?>'><?= $sl["name"]?>[&#8377; <?= $sl['rate'];?>]</option>
             <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
          <label>OFFER PRICE</label>
          <input type="text" name="offer_price" id="offer_price" class="form-control" required="required">   
          </div> 
          <div class="form-group">
            <input type="hidden" class="form-control form-control-sm" id="status" name="status" value="ACTIVE">
          </div>
         <!--  <div class="form-group">
            <label>Brand Logo</label>
            <input type="text" name="photo" id="file" class="form-control" required="required">
          </div> -->
        </form>
      </div>
    </div>
  </div>
        <div class="modal-footer bg-whitesmoke br">
        <input type="hidden" id='dataId'>
                <button type="button" name="submit" data-frm='#offerForm'  data-tbl='offer' data-ctrl='update_now' onclick="saveData(this)" value="Save" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
