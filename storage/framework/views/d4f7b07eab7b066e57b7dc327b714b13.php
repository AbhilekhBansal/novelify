<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .col{
            padding: 10px;
            margin: auto;
        }
        .card{
            width: 500px;
            margin: auto;
        }
    </style>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    </head>
    <body>
    
    <form  id="form">
  
    <div class="container mt-3">
    <div class="card">
        <h1 class="col"><?php echo e($title); ?></h1>
        <div class="col">
            <label>Name:</label>
            <input name="name" type="text" placeholder="Full Name" id="name" value="<?php echo e($Customers?->name); ?>" >
            <input value="<?php echo e($url); ?>" name="url" id="url" hidden>
            <span class="text-danger"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
        </div>
        <div class="col">
            <label>Phone:</label>
            <input name="phone" type="text" placeholder="phone no." id="phone" value="<?php echo e($Customers?->phone); ?>"><span class="text-danger"><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
        </div>
    
        <div class="col">
            <label>Email:</label>
            <input name="email" type="text" placeholder="Email" id="email" value="<?php echo e($Customers?->email); ?>"><span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
        </div>
        <div class="col">
            <label>Address:</label>
            <textarea name="address"  id="address" type="text"><?php echo e($Customers?->address); ?></textarea><span class="text-danger"><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
        </div>
        <div class="col">
            <label>Image:</label><br>
            <input name="image" type="file" id="image" >
            <span class="text-danger"><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
            <img src="<?php echo e(asset('images/'.$Customers?->image)); ?>" width="80px">
        </div>
        
        <div class="col">
            <button name="submit" type="submit">Submit</button>
        </div>
    </div>
    
</div>
    </form>

    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
     $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    

    $("#form").submit(function(event){

       // alert("hello");
    event.preventDefault();
   
    var formData = new FormData($(this)[0]); 

        // var name=$("#name").val();
        // var phone=$("#phone").val();
        // var email=$("#email").val();
        // var address=$("#address").val();
        var url= $("#url").val();
        // var image = $('#image').prop('files')[0];   
        // alert(url);
       // alert(phone);

        // formData.append('image', image);
        // formData.append('name', name);
        // formData.append('phone', phone);
        // formData.append('email', email);
        // formData.append('address', address);
        // formData.append('name', name);

        $.ajax({
            url:url,
            type: 'POST',
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success:function(response){
            // alert(response.success);
           location.href = '/customer-view';
       

            },
        });

    

});
    


</script>


<?php /**PATH C:\xampp\htdocs\web1\resources\views/form.blade.php ENDPATH**/ ?>