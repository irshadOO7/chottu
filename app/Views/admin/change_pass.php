 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Change Password</h1>
          
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="javascript:void(0)">Change Password</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
              <div class="col-3">
              </div> 
              <div class="col-6">
                 <div class="card">
                  <div class="card-body">
                    <form method="post" id="change_passFrm" autocomplete="off">
                    <div class="form-group">
                      <label>Current Password</label>
                      <input type="text" autocomplete="false" class="form-control" name="current_pass" id="current_pass" placeholder="Enter Current Password" required="required">
                      <small  class="form-text text-muted">Enter Your Current Password.</small>
                    </div>
                    <div class="form-group">
                      <label>New Password</label>
                      <input type="password" autocomplete="false" class="form-control" name="new_pass" id="new_pass" placeholder="New Password" required="required">
                    </div>
                    <div class="form-group con">
                      <label>Confirm Password<i class="far fa-eye" id="togglePassword" onclick="showPass(this)"></i></label>
                      <input type="password" autocomplete="false" class="form-control" name="confirm_pass" id="con_pass" placeholder="Confirm Password" required="required">
                    </div>
                   <!--  <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                  </form>
                  <?php $session=session();
                        $arr = $session->login_user;
                        extract($arr);


                   ?>
                   <div class="form-group con">
                      <input type="hidden" class="form-control"  id="dataId" value="<?php echo $user_id; ?>">
                    </div>
                   <button type="button" class="btn btn-primary" data-tbl='user' data-frm="#change_passFrm" data-ctrl="confirm_pass"  onclick="saveData(this)" value="Save">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </section>
  

 