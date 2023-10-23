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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
   
</head>

<body>


<?php $__env->startSection('content'); ?>

    <div class="header">
        <?php echo $__env->make('works.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<?php if($works->isEmpty()): ?>
    <div class="message">
        <h1>投稿作品はまだありません。</h1>
        <img src="<?php echo e(asset('img/gomennyasai.png')); ?>" alt="" class="gomennyasai">
    </div>
<?php else: ?>

<?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1>自分の作品一覧</h1>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="container position-relative">
        <img  id="myImage" src="<?php echo e(asset('img/indexwindow.png')); ?>" class="img-fluid" alt="">
            
            <div class="position-absolute top-50 start-50 translate-middle text-center">

    <table class="table table-striped">
        <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($work->title); ?></th>
            </tr>
            <tr>
                <td><img src="<?php echo e(asset('storage/images/' . $work->image_path)); ?>" alt="<?php echo e($work->title); ?>" width="100%"></td></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>


<table class="table table-striped" >
      
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

            <tr>
                <td>
                    <a href="<?php echo e(route('works.edit', ['work' => $work->id])); ?>" class="btn btn-primary">編集</a>
                </td>

                <td>
                    <form method="post" action="<?php echo e(route('works.destroy',['work' => $work->id])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？')">
                            削除
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>

<div class="likes-count" data-work-id="<?php echo e($work->id); ?>">いいね数: Loading...</div>

<div class="toSearch">
    <a href="<?php echo e(route('search')); ?>">検索ページへ戻る</a>
</div>

</div>
        <div class="mb-4 d-flex justify-content-center">
            <?php echo e($works->links('pagination::bootstrap-4')); ?>

        </div>

<?php endif; ?>


<script>
  // ページ読み込み時にいいね数を取得して表示
  document.addEventListener("DOMContentLoaded", function() {
        var workId = "<?php echo e($work->id); ?>";
        var likesCountElement = document.querySelector('.likes-count[data-work-id="' + workId + '"]');
        
        // いいね数を取得するためのAjaxリクエストを送信
        fetch('/works/' + workId + '/likes')
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (data.likes !== undefined) {
                    likesCountElement.textContent = 'いいね数: ' + data.likes;
                }
            });
    });
</script>








<?php $__env->stopSection(); ?>





    
</body>
</html>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/works/myIndex.blade.php ENDPATH**/ ?>