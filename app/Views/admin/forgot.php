<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexa/source/light/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 May 2020 15:56:40 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login Forgot</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet"  href="<?= base_url(); ?>/assets/bundles/izitoast/css/iziToast.min.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url(); ?>/assets/img/favicon.ico' />
</head>

<body class="background-image-body">
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand login-brand-color">
            	<img alt="image" src="<?= base_url(); ?>/assets/img/logo.png" />
              User Reset
            </div>
            <div class="card">
              <div class="card-header card-header-auth">
                <h4>Reset Password</h4>
              </div>
              <!-- <center>
              <div class="logo-auth">
              	<img alt="image" src="<?= base_url(); ?>/assets/img/logo.png" />
          	  </div>
          	  <div>
          	  	<span class="logo-name-auth">Grexa</span>
          	  </div>
          	  </center> -->
              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" id="resetForm">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" required autofocus>
                  </div>
                  <div class="form-group">
                  </div>
                </form>
                <button type="button" name="submit" class="btn btn-lg btn-block btn-auth-color"  data-frm="#resetForm" data-ctrl="reset" data-tbl="user" onclick="saveData(this)" value="Save">
                      Reset Now
                    </button>
                    <div class="float-right text-capitalize">
                        <a href="<?php echo site_url('admin/index') ?>" class="text-small">
                          login
                        </a>
                      </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>/assets/js/page/chhotu.js"></script>
  <script src="<?= base_url(); ?>/assets/js/jquery.validate.min.js"></script>
  <script src="<?= base_url(); ?>/assets/bundles/izitoast/js/iziToast.min.js"></script>
</body>
</html>