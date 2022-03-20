
<?php $__env->startSection('content'); ?>
<div class="page-header">
	<h3 class="page-title"> PDF </h3>
</div>
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Upload Pdf files</h4>
				<form action="<?php echo e(url(Request::segment(1).'/uploadpdf')); ?>" method="post" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<input type="text" name="name" placeholder="Pdf Name" required>
				<input type="file" name="file" accept="application/pdf" required>
				<input type="submit" value="Upload">
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
			<h4 class="card-title">PDF List</h4>
			<table class="table table-bordered" id="pdfTable">
				<thead>
				<tr>
					<td>Id</td>
					<td>Name</td>
				</tr>
				</thead>
				<tbody>
				<?php
				$i = 1;
				?>
				<?php $__currentLoopData = $pdf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($i); ?></td>
					<td><a style="cursor:pointer;" onclick="viewPdf('<?php echo e($file->id); ?>', '<?php echo e($file->name); ?>', '<?php echo e($file->file); ?>');"><?php echo e($file->name); ?></a></td>
				</tr>
				<?php
				$i++;
				?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
			<h4 class="card-title">Preview</h4>
			<?php if(count($pdf) > 0): ?>
			<h4 class="card-title" id="pdfName"><?php echo e($pdf[0]->name); ?></h4>
			<iframe height="400" width="400" id="pdfSrc" src="/uploads/<?php echo e($pdf[0]->file); ?>"></iframe>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('#pdfTable').DataTable();
});
function viewPdf(id, name, file) {
	$("#pdfName").text(name);
	var srcFile = "/uploads/"+file;
	$("#pdfSrc").attr("src", srcFile);
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bavithra\RBHospital\resources\views/pdf.blade.php ENDPATH**/ ?>