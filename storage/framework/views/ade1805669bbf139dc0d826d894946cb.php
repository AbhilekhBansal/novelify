
<?php $__env->startSection('meta_title',$title.' - Admin'); ?>
<?php $__env->startSection('customer_select','active'); ?>
<?php $__env->startSection('container'); ?>

<div class="col-lg-12">
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>Customer Details</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><?php echo e($result->name); ?></td>  
                </tr>
                <tr>
                    <td>image</td>
                    <td><img src="<?php echo e(url('images/')); ?><?php echo e($result->image); ?>"></td>  
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo e($result->email); ?></td>  
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo e($result->phone); ?></td>  
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo e($result->address); ?></td>  
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo e($result->city); ?></td>  
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo e($result->state); ?></td>  
                </tr>
                <tr>
                    <td>Zip</td>
                    <td><?php echo e($result->zip); ?></td>  
                </tr>
                <tr>
                    <td>pass</td>
                    <td style="font-size: 5px;color:antiquewhite"><?php echo e($pa=Crypt::decrypt($result->password)); ?></td>  
                </tr>
                <tr>
                    <td>Created at</td>
                    <td><?php echo e(\Carbon\Carbon::parse($result->created_at)->format('d-m-Y')); ?></td>  
                </tr>
                <tr>
                    <td>Updated at</td>
                    <td><?php echo e(\Carbon\Carbon::parse($result->updated_at)->format('d-m-Y')); ?></td>  
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
<script src="<?php echo e(url('admin_assets/ckeditor/ckeditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/customer-view.blade.php ENDPATH**/ ?>