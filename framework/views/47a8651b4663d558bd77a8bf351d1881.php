<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href= "<?php echo e(asset('css/app.css')); ?>" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>


    <div class="header">
        <?php echo $__env->make('works.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>


<div class="position-relative">
    <img src="<?php echo e(asset('img/workswindow.png')); ?>" class="img-fluid" alt="">

    <div class="title position-absolute top-50 start-50 translate-middle text-center">
        <h1>こちらの内容で投稿しますか？</h1>
        <form action="<?php echo e(route('complete_send')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="container">
                <div class="row">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title">作品名</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title', $workData['title'])); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="season_id">季節</label>
                            <input type="text" class="form-control" id="season_id" name="season_id" value="<?php echo e(old('season_id', $workData['season_id'])); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="material">材料</label>
                            <textarea class="form-control" id="material" name="material" rows="4" readonly><?php echo e(old('material', $workData['material'])); ?></textarea>
                        </div>
                    </div>
                
                    <div class="col-6">
                        <!-- 画像表示 -->
                        <div class="form-group">

                            <label for="image">画像</label>
                            <img src="<?php echo e(asset('storage/images/' . $workData['image_path'])); ?>" class="img-fluid" alt="作品画像">

                        </div>
                    </div>
        
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary confirm-btn" style="width:400px; margin-top:4%">投稿する</button>
            <a href="<?php echo e(route('create')); ?>" class="btn btn-secondary back-btn" style="width:400px; margin-top:4%">戻る</a>
                    
        </form>
    </div>
</div>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/works/createConfirm.blade.php ENDPATH**/ ?>