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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</head>




<?php $__env->startSection('content'); ?>
<body>

    <div class="header">
        <?php echo $__env->make('works.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="position-relative">
        <img src="<?php echo e(asset('img/editwindow.png')); ?>" class="img-fluid" alt="">
    
        <div class="title position-absolute top-50 start-50 translate-middle text-center">
            <h1>作品の編集</h1>

            <!-- フォーム -->
            <form action="<?php echo e(route('works.update', ['work' => $work->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> 

                <div class="form-group">
                    <label for="title">作品名</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($work->title); ?>" required>
                </div>

                <div class="form-group">
                    <label for="season_id">季節</label>
                    <select class="form-control" id="season_id" name="season_id">
                        <option value="春" <?php echo e($work->season_id == '春' ? 'selected' : ''); ?>>春</option>
                        <option value="夏" <?php echo e($work->season_id == '夏' ? 'selected' : ''); ?>>夏</option>
                        <option value="秋" <?php echo e($work->season_id == '秋' ? 'selected' : ''); ?>>秋</option>
                        <option value="冬" <?php echo e($work->season_id == '冬' ? 'selected' : ''); ?>>冬</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="material">材料</label>
                    <textarea class="form-control" id="material" name="material" rows="4" required><?php echo e($work->material); ?></textarea>
                </div>

                <!-- 画像追加 -->
                <div class="form-group">    
                    <label for="image">新しい画像を選択</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div>

                <button type="submit" class="btn btn-primary upload-btn" style="width:400px">更新する</button>
            </form>
            <!-- フォーム終了 -->

        </div>
    </div>
</body>

<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/works/edit.blade.php ENDPATH**/ ?>