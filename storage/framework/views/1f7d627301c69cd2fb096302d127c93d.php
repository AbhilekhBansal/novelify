
<?php $__env->startSection('meta_title','Slider - Admin'); ?>
<?php $__env->startSection('slider_select','active'); ?>
<?php $__env->startSection('container'); ?>
<h3>Manage Slider</h3>
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
            <h4 class="add-btn m-2"><a href="/admin/slider/add"><button type="button" class="btn btn-primary btn-sm">Add Slider</button></a></h4>
        
        
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Sr.no:</th>
                        <th>slider image</th>
                        <th>Heading</th>
                        <th>Title</th>
                        
                        
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><img src="<?php echo e(asset('images/'.$item->image)); ?>" style="max-width:140px"></td>
                        <td><?php echo e($item->heading); ?></td>
                        <td><?php echo e($item->title); ?></td>
                        
                        
                        
                        <td>
                            <?php if($item->status == 1): ?>
                                <a href="<?php echo e(url('/admin/slider/status/0')); ?>/<?php echo e($item->id); ?>"><button type="button" class="btn btn-outline-success btn-sm m-2">Active</button></a>
                                <?php elseif($item->status == 0): ?>
                                <a href="<?php echo e(url('/admin/slider/status/1')); ?>/<?php echo e($item->id); ?>"><button type="button" class="btn btn-outline-warning btn-sm m-2">Deactive</button></a>

                            <?php endif; ?>

                        </td>
                        <td>
                            <a href="<?php echo e(route('slider.update',['id'=>$item->id])); ?>"><button type="button" class="btn btn-outline-primary btn-sm m-2">Edit</button></a>
                            <a href="<?php echo e(route('slider.delete',['id'=>$item->id])); ?>"><button type="button" class="btn btn-outline-danger btn-sm m-2">Delete</button></a>
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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/slider.blade.php ENDPATH**/ ?>