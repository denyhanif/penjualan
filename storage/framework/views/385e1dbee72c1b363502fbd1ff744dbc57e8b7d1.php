<!-- mengambil dari template.blade.php dari folderlayout,, dan di yield -->



<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class = "row">
    <div class="col-md-12">
        <div class="box-header with-border">
            //ini bagian header
        </div>
        <div class="box-body">
            //ini adalah bagian content
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\penjualan\resources\views/home.blade.php ENDPATH**/ ?>