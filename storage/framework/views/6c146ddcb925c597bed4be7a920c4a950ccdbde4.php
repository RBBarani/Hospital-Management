
<?php $__env->startSection('content'); ?>
<div class="page-header">
	<h3 class="page-title"> Create Appointment </h3>
</div>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<form method="POST" action="<?php echo e(url(Request::segment(1).'/appointments/store')); ?>">
				<?php echo csrf_field(); ?>
			  <div class="form-group row">
				<label for="patient_id" class="col-sm-3 col-form-label">Patient</label>
				<div class="col-sm-9">
				  <?php echo e(Form::select('patient_id', $data['patient'], '', ['required' => 'true', 'class' => 'form-control'])); ?>

				</div>
			  </div>
			  <div class="form-group row">
				<label for="department_id" class="col-sm-3 col-form-label">Department</label>
				<div class="col-sm-9">
					<?php echo e(Form::select('department_id', $data['department'], '', ['required' => 'true', 'id' => 'department_id', 'class' => 'form-control'])); ?>

				</div>
			  </div>
			  <div class="form-group row">
				<label for="doctor_id" class="col-sm-3 col-form-label">Doctor</label>
				<div class="col-sm-9">
					<?php echo e(Form::select('doctor_id', [], '', ['required' => 'true', 'id' => 'doctor_id', 'class' => 'form-control'])); ?>

				</div>
			  </div>
			  <div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Time</label>
				<div class="col-sm-9">
					<input type="date" name="date" id="date" class="form-control" required>
				</div>
			  </div>
			  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
			  <button class="btn btn-light">Cancel</button>
			</form>
		  </div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
	showDocs($("#department_id").val());
	$('#department_id').on('change', function() {
		var did = $(this).val();
		showDocs(did);
		
	});
	
	function showDocs(did) {
		if(did) {
			$.ajax({
				url: '/<?php echo e(Request::segment(1)); ?>/appointments/getDoctor/'+did,
				type: "GET",
				data : {"_token":"<?php echo e(csrf_token()); ?>"},
				dataType: "json",
				success:function(data) {
					if(data){
						$('#doctor_id').empty().append('<option value="">-- Select Doctor --</option>');
						$.each(data, function(key, value){
							$('select[name="doctor_id"]').append('<option value="'+ key +'">' + value+ '</option>');
						});
					}else{
						$('#doctor_id').empty();
					}
			  }
			});
		}else{
		  $('#doctor_id').empty();
		}
	}
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bavithra\RBHospital\resources\views/createAppointments.blade.php ENDPATH**/ ?>