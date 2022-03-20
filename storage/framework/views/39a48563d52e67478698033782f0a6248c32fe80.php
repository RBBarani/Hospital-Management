
<?php $__env->startSection('content'); ?>
<div class="page-header">
	<h3 class="page-title"> Patients </h3>
</div>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<table class="table table-bordered" id="patTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email Id</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($patient->id); ?></td>
						<td><?php echo e($patient->name); ?></td>
						<td><?php echo e($patient->email); ?></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		  </div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('#patTable').DataTable();
});
// $("#datetime").datetimepicker({
    // format: 'yyyy-mm-dd hh:ii',
    // autoclose: true
// });

$(function () {
	$('#datetime').datetimepicker({
		format:'M-d-Y',
		// useCurrent: false,
	});
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bavithra\RBHospital\resources\views/patients.blade.php ENDPATH**/ ?>