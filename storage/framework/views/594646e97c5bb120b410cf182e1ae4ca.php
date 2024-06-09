
<?php $__env->startSection('meta_title','customer - Admin'); ?>
<?php $__env->startSection('customer_select','active'); ?>
<?php $__env->startSection('container'); ?>
<h3>Manage Customers</h3>
<div class="row m-t-30">
    
    <div class="col-md-12">
        <!-- DATA TABLE-->
        
            <?php if(session('message')!=""): ?>
            <div class="sufee-alert alert with-close alert-<?php echo e(session('class')); ?> alert-dismissible fade show" style="display: inline-flex;">
                <?php echo e(session('message')); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php endif; ?>
            
        
        
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Sr.no:</th>
                        <th>customer Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><img src="<?php echo e(asset('images/'.$item->image)); ?>" width="80px"></td>
                        <td><?php echo e($item->email); ?></td>
                        <td><?php echo e($item->phone); ?></td>
                        <td><?php echo e($item->address); ?>,<?php echo e($item->city); ?></td>
                        <td>
                            <?php if($item->status == 1): ?>
                                <a href="<?php echo e(url('/admin/customer/status/0')); ?>/<?php echo e($item->id); ?>"><button type="button" class="btn btn-outline-success btn-sm m-2">Active</button></a>
                            <?php elseif($item->status == 0): ?>
                                <a href="<?php echo e(url('/admin/customer/status/1')); ?>/<?php echo e($item->id); ?>"><button type="button" class="btn btn-outline-warning btn-sm m-2">Deactive</button></a>
                            <?php endif; ?>
                        
                            <a href="<?php echo e(route('customer.show',['id'=>$item->id])); ?>"><button type="button" class="btn btn-outline-primary btn-sm m-2">View</button></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/customer.blade.php ENDPATH**/ ?>