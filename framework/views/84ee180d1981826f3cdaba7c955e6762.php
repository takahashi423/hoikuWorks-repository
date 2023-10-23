<!DOCTYPE html>
<html lang="en">
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


<?php $__env->startSection('content'); ?>


    <div class="position-relative">
        <img src="<?php echo e(asset('img/workswindow.png')); ?>" class="img-fluid" alt="">
    
        <div class="title position-absolute top-50 start-50 translate-middle text-center">
            <h1>作品投稿</h1>
            <form action="<?php echo e(route('work_post')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="title">作品名</label>
                    <input type="text" class="form-control" id="title" name="title" required>    
                </div>

                <div class="form-group">
                    <label for="season">季節</label>
                    <select class="form-control" id="season" name="season">
                        <option value="spring">春</option>
                        <option value="summer">夏</option>
                        <option value="autumn">秋</option>
                        <option value="winter">冬</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="materials">材料</label>
                    <textarea class="form-control"  id="materials" name="materials" rows="4" required></textarea>
                </div>

                <!-- 画像追加 -->
                <div class="form-group">
                    <label for="image">画像を選択</label>
                    <input type="file" class="form-control-file" id="image" name="image/" required>
                </div>

                <button type="submit" class="btn btn-primary upload-btn" style="width:400px">アップロード</button>

            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/hoikus/work.blade.php ENDPATH**/ ?>