<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .aln button{
            /* float: right; */
            color: white;
            background: blue;
            border: none;
        }
        .btnD{
            background: #f72424;
            color:black;
            color: snow;
            padding: 5px;
            padding-left: 8px;
            padding-right: 8px;
            border: none;
        }
        .btnE{
            background: #47cd47;
            color:black;
            color: snow;
            padding: 5px;
            padding-right: 8px;
            padding-left: 8px;
            border: none;
        }
        .nav{
            padding: 20px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row nav">
            
                <div class="col"><h2>HOME</h2></div>
                <div class="col aln">
                    <a href="<?php echo e(url('/customer/add')); ?>"><button class="btn btn-pending">Add User</button></a>
                
                    <a href="<?php echo e(url('/customer/trash')); ?>"><button class="btn btn-pending">View Trash</button></a>
                </div>
            
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $Customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($customer->id); ?></td>
                    <td><img src="images/<?php echo e($customer->image); ?>" width="80px"></td>
                    <td><?php echo e($customer->name); ?></td>
                    <td><?php echo e($customer->phone); ?></td>
                    <td><?php echo e($customer->email); ?></td>
                    <td><?php echo e($customer->address); ?></td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="<?php echo e(route('customer.delete',['id'=>$customer->id])); ?>"><button class="btnD">Move to Trash </button></a>
                            </div>
                            <div class="col">
                                <a href="<?php echo e(route('customer.edit',['id'=>$customer->id])); ?>"><button class="btnE">Edit </button></a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\web1\resources\views//customer-view.blade.php ENDPATH**/ ?>