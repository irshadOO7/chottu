<?php
 use App\Models\chottuModel;
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Product</h1>
             <div class="" style="margin-left:20px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='product_details' data-frm="#productForm" onmouseover="cleanData(this)" onmouseover="cleanData(this)" data-imgshow='product_photo'  onclick="generateRow(this)">ADD NEW</button>
                  </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Product</a></div>
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
                            <th>BRAND</th>
                            <th>Category</th>
                            <th>SALT</th>
                            <th>MRP</th>
                            <th>RATE</th>
                            <th>STOCK</th>
                            <th>UNIT</th>
                            <th>STATUS</th>
                            <th>CRREATED AT</th>
                             <th>ACTION</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($product) : ?> 
                          <?php foreach ($product as $prd) :
                             $brand_id = $prd['brand_id'];  
                             $category_id = $prd['category_id'];
                             $model = new chottuModel();
                             $brand = $model->get_object('brand',array('id'=>$brand_id));
                             $category = $model->get_object('category',array('id'=>$category_id));
                            ?>
                          <tr>
                            <td><?= $prd['name']; ?></td>
                            <td><?= $brand->name; ?></td>
                            <td><?= $category->name; ?></td>
                            <td><?= $prd['salt_name']; ?></td>
                            <td><?= $prd['mrp']; ?></td>
                            <td><?= $prd['rate']; ?></td>
                            <td><?= $prd['stock']; ?></td>
                            <td><?= $prd['unit']; ?></td>
                            <td><?= $prd['status']; ?></td>
                            <td><?= date('d-m-Y h:i a', strtotime($prd['created_at'])); ?></td>
                            <td> <ul class="list-inline m-0">
                                   <li class="list-inline-item">
                                     <button class="btn btn-success btn-sm rounded-0" data-frm='#productForm' data-modal='#centerModal'  data-img='product_photo' data-imgshow='#dispPhoto' onclick="editRow(this)" data-row='<?php echo json_encode($prd);?>' type="button" data-toggle="" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </li>
                                    <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="" onclick="delRow(this)" data-name='product_details' id='<?php echo $prd['id'];?>' data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             <!--    Modal Content... -->
             <form  method="post" enctype="multipart/form-data" id="productForm">
             <div class="row">
              <div class="col-lg-6">      
          <div class="form-group ">
            <label>NAME</label>
            <input type="text" name="name"  id='name' class="form-control" required="required">
          </div>
           <div class="form-group ">
            <label>BRAND</label>
            <select type="text" name="brand"  id='brand' class="form-control" required="required">
              <option value="">----select one----</option>
              <?php 
              $model = new chottuModel();
              $model->dropdown('brand',"status='ACTIVE'",'name');
              ?>
            </select>
          </div> <div class="form-group ">
            <label>Category</label>
            <select type="text" name="category"  id='category' class="form-control" required="required">
              <option value="">----select one----</option>
              <?php 
              $model = new chottuModel();
              $model->dropdown('category',"status='ACTIVE'",'name');
              ?>
            </select>
          </div>   
           <div class="form-group ">
            <label>SALT</label>
            <input type="text" name="salt_name"  id='salt_name' class="form-control" required="required">
          </div>
           <div class="form-group ">
            <label>MRP</label>
            <input type="text" name="mrp"  id='mrp' class="form-control" required="required">
            </div></div>
          <div class="col-lg-6"> 
           <div class="form-group ">
            <label>RATE</label>
            <input type="text" name="rate"  id='rate' class="form-control" required="required">
          </div>
           <div class="form-group ">
            <label>STOCK</label>
            <input type="text" name="stock"  id='stock' class="form-control" required="required">
          </div>
           <div class="form-group ">
            <label>UNIT</label>
            <input type="text" name="unit"  id='unit' class="form-control" required="required">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control form-control-sm" id="status" name="status">
          </div>
          <div class="form-group">
            <label class="control-label" for="img1">Product Logo Change Your Photo (size < 100 kb)</label>
            <input class="form-control input-md" data-ctrl="upload_img" type="file" id='product_photo' data-name='product_details' data-category='photo' display-tag="#dispPhoto" required="required">
          </div>
           <!-- <div class="form-group">
            <label class="control-label" for="img1">Product Logo Change Your Photo (size < 100 kb)</label>
            <input class="form-control input-md" data-ctrl="upload_img" type="file" id='product_photo' data-name='product_details' data-category='photo' display-tag="#dispPhoto" required="required">
          </div>
           <div class="form-group">
            <label class="control-label" for="img1">Product Logo Change Your Photo (size < 100 kb)</label>
            <input class="form-control input-md" data-ctrl="upload_img" type="file" id='product_photo' data-name='product_details' data-category='photo' display-tag="#dispPhoto" required="required">
          </div> -->
          <center><img  id='dispPhoto' src='' style='height:80px'></span></center>
           <div class="form-group">
            <input type="hidden" class="form-control form-control-sm" id="status" name="status" value="ACTIVE">
          </div>
        </form>
      </div>
    </div>
  </div>
        <div class="modal-footer bg-whitesmoke br">
        <input type="hidden" id='dataId'>
                <button type="button" name="submit" data-frm='#productForm'  data-tbl='product_details' data-ctrl='update_now' onclick="saveData(this)" value="Save" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
