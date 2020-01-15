<?php $__env->startSection('title'); ?>
Data User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div calss="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">

                 <?php if(Request::get('keyword')): ?>
                    <a class="btn btn-success" href="<?php echo e(route('user.index')); ?>"> Back </a>
                 <?php else: ?>
                    <a class="btn btn-success" href="<?php echo e(route('user.create')); ?>"><span class="glyphicon glyphicon-plus"></span>Create</a>
                 <?php endif; ?> 
                <form method="get" action="<?php echo e(route('user.index')); ?>">
                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Search by name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="keyword" name="keyword" value="<?php echo e(Request::get('keyword')); ?>" >
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-search"></span>
                            </button> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="box body">
                <?php if(Request::get('keyword')): ?>
                    <div class="alert alert-success alert-block">
                        Hasil pencarian dengan nama <b> <?php echo e(Request::get('keyword')); ?></b>
                    </div>
               
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th width="30%">Action</th>
                        </tr>                    
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop -> iteration + ($user->perpage()*($user->currentPage()-1))); ?></td>
                                <td><?php echo e($row-> name); ?></td>
                                <td><?php echo e($row->username); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td><?php echo e($row->level); ?></td>
                                <td>-</td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>              
                </table>
                <!-- paging menjadi 2 halaman,, setting paginate si usercontroller-->
                <?php echo e($user->appends(Request::all())->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\penjualan\resources\views/user/index.blade.php ENDPATH**/ ?>