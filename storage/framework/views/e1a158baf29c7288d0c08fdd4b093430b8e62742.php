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

    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/logo-mini.png" />
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
	
	
	
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo"><img src="../../assets/images/logo-mini.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini"><img src="../../assets/images/logo-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="<?php echo e(url(Request::segment(1).'/logout')); ?>">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">
					<?php 
					$segment = Auth::user()->name;
					$table = 'patients';
					$urls = 'patient';
					if((Request::segment(1) == "admin") || (Request::segment(1) == "doctor")) {
						$segment = Auth::guard(Request::segment(1))->user()->name;
						$table = Auth::guard(Request::segment(1))->user()->getTable();
						$urls = Request::segment(1);
					}
					?>

				  <?php echo e(ucfirst($segment)); ?></span>
				  <span class="text-secondary text-small"><?php echo e(strtoupper(substr_replace($table ,"",-1) )); ?></span>
                  
                </div>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo e(url($urls.'/appointments')); ?>">
                <span class="menu-title">Appointments</span>
                <i class="mdi mdi-calendar-heart menu-icon"></i>
              </a>
            </li>
			<?php if(Request::segment(1) == "admin"): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url($urls.'/doctors')); ?>">
                <span class="menu-title">Doctors</span>
                <i class="mdi mdi-doctor menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url($urls.'/patients')); ?>">
                <span class="menu-title">Patients</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>			
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url($urls.'/pdf')); ?>">
                <span class="menu-title">PDF</span>
                <i class="mdi mdi-file-pdf menu-icon"></i>
              </a>
            </li>			 
			<?php endif; ?>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
			  <?php if(count($errors) > 0): ?>
				 <div class = "alert alert-danger">
					<ul>
					   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <li><?php echo e($error); ?></li>
					   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				 </div>
			  <?php endif; ?>
			<?php echo $__env->yieldContent('content'); ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © rbbarani 2022</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>


	
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

	<!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
	<?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html><?php /**PATH D:\bavithra\RBHospital\resources\views/layout.blade.php ENDPATH**/ ?>