<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href= "<?php echo e(asset('css/app.css')); ?>" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>



    <div class="header">
        <?php echo $__env->make('hoikus.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    
    
    
    <div class="container position-relative">
        <img  id="myImage" src="<?php echo e(asset('img/footer.png')); ?>" class="img-fluid" alt="">
            
            <div class="position-absolute top-50 start-50 translate-middle text-center">
    
                <button type="button" class="btn  btn-success btn-lg custom-button" style="width:400px; margin-bottom:50px" >投稿する</button>
                <br>
                <button type="button" class="btn  btn-danger btn-lg custom-button" style="width:400px">閲覧する</button>
                
            </div>
    </div>

    



    
</body>
</html><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/hoikus/main.blade.php ENDPATH**/ ?>