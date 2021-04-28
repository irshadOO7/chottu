<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexa/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 May 2020 15:48:38 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bundles/bootstrap-social/bootstrap-social.css">
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
              Admin Login
            </div>
            <div class="card">
              <div class="card-header card-header-auth">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo site_url('admin/login_aciton'); ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="<?php echo site_url('admin/forgot') ?>" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-lg btn-block btn-auth-color" onclick="logIn()">
                      Login
                    </button>
                  </div>
                </form>
                <!-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div> -->
              </div>
            </div>
           <!--  <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
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


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexa/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 May 2020 15:48:38 GMT -->
</html>