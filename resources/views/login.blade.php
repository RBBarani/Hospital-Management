<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RBHospital</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/logo-mini.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-center p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo-mini.png">
                </div>
				@php 
				$segment = 'patient';
				if(Request::segment(1)) 
				$segment = Request::segment(1);					
				@endphp
                <h6 class="font-weight-bold">{{ucfirst($segment)}} Login</h6>
                <form method="POST" action="{{ route($segment.'.login.submit') }}">
					@csrf
					<div class="form-group">
						<input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email">
						@if ($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password">
						@if ($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="mt-3">
						<input type="submit" value="SIGN IN" name="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
					</div>
                </form>
				@if($segment == 'patient')
				<div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">Create Appoinment as <a href="guestUser">Guest</a>?  </label>
                    </div>
                </div>
				@endif
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>