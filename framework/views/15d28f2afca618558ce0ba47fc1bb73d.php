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



<?php $__env->startSection('content'); ?>

    <div class="header">
        <?php echo $__env->make('works.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<?php if(count($works) > 0): ?>
    <h1>キーワード検索結果: "<?php echo e($keyword); ?>"</h1>

    <div class="container position-relative">
        <img  id="myImage" src="<?php echo e(asset('img/indexwindow.png')); ?>" class="img-fluid" alt="">
            
        <div class="position-absolute top-50 start-50 translate-middle text-center">

            <table class="table table-striped">
                <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($work->title); ?></th>
                    </tr>
                    <tr>
                        <td><img src="<?php echo e(asset('storage/images/' . $work->image_path)); ?>" alt="<?php echo e($work->title); ?>" width="100%"></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>

<table class="table table-striped" >
    <thead>
        <!-- テーブルのヘッダーを設定 -->
    </thead>
    <tbody>
        <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
            <tr>
                <td style="width: 100px;">季節</td>
                <td><?php echo e($work->season_id); ?></td>
            </tr>
            <tr>
                <td style="width: 100px;">材料</td>
                <td><?php echo e($work->material); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="toSearch">
                <a href="<?php echo e(route('search')); ?>">検索ページへ戻る</a>
            </div>
        </div>
        <div class="mb-4 d-flex justify-content-center">
            <?php echo e($works->appends(['keyword' => $keyword, 'season_id' => $season_idId])->links('pagination::bootstrap-4')); ?>

        </div>
    </div>

<?php else: ?>
    <div class="message">
        <h1>該当する作品は見つかりませんでした。</h1>
        <img src="<?php echo e(asset('img/gomennyasai.png')); ?>"alt="" class="gomennyasai">
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/works/searchIndex.blade.php ENDPATH**/ ?>