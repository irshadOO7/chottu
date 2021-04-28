
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Brand</h1>
            <div class="" style="margin-left: 20px">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='brand' data-frm='#brandForm' onmouseover="cleanData(this)" data-imgshow='#dispPhoto'  onclick="generateRow(this)">ADD NEW</button>
                  </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Brand</a></div>
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
                            <th>BRAND LOGO</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>CRREATED AT</th>
                             <th>ACTION</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($brand) : ?> 
                          <?php foreach ($brand as $br) : ?>
                          <tr>
                            <td><img style="width:50px; height: 50px;" src="<?= base_url('uploads').'/'.$br['brand_photo']?>"></td>
                            <td><?= $br['name']; ?></td>
                            <td><?= $br['status']; ?></td>
                            <td><?= date('d-M-Y h:i a', strtotime($br['created_at'])); ?></td>
                            <td> <ul class="list-inline m-0">
                                   <li class="list-inline-item">
                                     <button class="btn btn-success btn-sm rounded-0" data-frm='#brandForm' data-img='brand_photo' data-imgshow='#dispPhoto' data-modal='#centerModal' onclick="editRow(this)" data-row='<?php echo json_encode($br);?>' type="button" data-toggle="" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </li>
                                    <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="" onclick="delRow(this)" data-name='brand' id='<?php echo $br['id'];?>' data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Brand Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             <!--    Modal Content... -->
             <div class="row">
              <div class="col-lg-12">
                <form  method="post" enctype="multipart/form-data" id="brandForm">
          <div class="form-group ">
            <label>Brand Name</label>
            <input type="text" name="name"  id='name' class="form-control" required="required">
          </div>
          <div class="form-group ">
             <label>Status</label>
            <select class="form-control form-control-sm" id="status" name="status">
              <option value="">----select one----</option>
              <option>ACTIVE</option>
              <option>BLOCKED</option>
             </select>
          </div>
          <div class="form-group">
              <label class="control-label" for="img1">Change Your Photo (size < 100 kb)</label>
                <input class="form-control input-md"  data-ctrl='upload_img'  id="brand_photo"  data-name='brand' data-category='photo' display-tag='  #dispPhoto'  type="file">       
          </div>
           <center><img  id='dispPhoto' src='' style='height:80px'></span></center>
         <!--  <div class="form-group">
            <label>Brand Logo</label>
            <input type="file" name="photo" id="file" onchange="uploadData(this)" class="form-control" required="required">
          </div> -->
        </form>
      </div>
    </div>
  </div>
        <div class="modal-footer bg-whitesmoke br">
        <input type="hidden" id='dataId'>
                <button type="button" name="submit" data-frm='#brandForm'  data-tbl='brand' data-ctrl='update_now' onclick="saveData(this)" value="Save" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
