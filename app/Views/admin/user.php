
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users</h1>
            <div class="" style="margin-left: 20px">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='user' data-frm='#userForm' onmouseover="cleanData(this)" data-imgshow='#dispPhoto'  onclick="generateRow(this)">ADD NEW</button>
                  </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Users</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#centerModal" data-name='user' data-frm='#userForm' onmouseover="cleanData(this)" data-imgshow='#dispPhoto'  onclick="generateRow(this)">ADD NEW</button>
                  </div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>USER TYPE</th>
                            <th>LAST LOGIN</th>
                             <th>ACTION</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($user) : ?> 
                          <?php foreach ($user as $ur) : ?>
                          <tr>
                            <td><?= $ur['user_name']; ?></td>
                            <td><?= $ur['user_email']; ?></td>
                            <td><?= $ur['user_type']; ?></td>
                            <td><?= date('d-M-Y h:i a', strtotime($ur['last_login'])); ?></td>
                            <td> <ul class="list-inline m-0">
                                   <li class="list-inline-item">
                                     <button class="btn btn-success btn-sm rounded-0" data-frm='#userForm' data-img='user_photo' data-imgshow='#dispPhoto' data-modal='#centerModal' onclick="editRow(this)" data-row='<?php echo json_encode($ur);?>' type="button" data-toggle="" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </li>
                                    <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="" onclick="delRow(this)" data-name='user' id='<?php echo $ur['id'];?>' data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
          <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             <!--    Modal Content... -->
             <div class="row">
              <div class="col-lg-6">
                <form  method="post" enctype="multipart/form-data" id="userForm">
          <div class="form-group ">
            <label>User Name</label>
            <input type="text" name="user_name"  id='user_name' class="form-control" required="required">
          </div>
          <div class="form-group ">
            <label>User Email</label>
            <input type="text" name="user_email"  id='user_email' class="form-control" required="required">
          </div></div>
           <div class="col-lg-6">
          <div class="form-group ">
             <label>User Type</label>
            <select class="form-control form-control-sm" id="user_type" name="user_type">
              <option value="">----select one----</option>
              <option>ADMIN</option>
              <option>STAFF</option>
             </select>
          </div> <div class="form-group ">
            <label>User Password</label>
            <input type="text" name="user_pass"  id='user_pass' class="form-control" required="required">
          </div>
           <div class="form-group">
            <input type="hidden" class="form-control form-control-sm" id="status_new" name="status_new" value="ACTIVE">
          </div>
        </form>
      </div>
    </div>
  </div>
        <div class="modal-footer bg-whitesmoke ur">
        <input type="hidden" id='dataId'>
                <button type="button" name="submit" data-frm='#userForm'  data-tbl='user' data-ctrl='user_update' onclick="saveData(this)" value="Save" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
