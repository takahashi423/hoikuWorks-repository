<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <link rel="stylesheet" href= "<?php echo e(asset('css/app.css')); ?>" >
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>

<body>


<?php $__env->startSection('content'); ?>

<h1>みんなの投稿</h1>
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
                        <td><button class="like-button" data-work-id="<?php echo e($work->id); ?>">いいね</button></td>
                        <td><span class="likes-count" data-work-id="<?php echo e($work->id); ?>">いいね数: Loading...</span></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>


        
       
        <div class="toSearch">
            <a href="<?php echo e(route('search')); ?>">検索ページへ戻る</a>
        </div>

    </div>
        
    <div class="mb-4 d-flex justify-content-center">
        <?php echo e($works->links('pagination::bootstrap-4')); ?>

    </div>

    



    <script>
        $(document).ready(function() {
            // ページ読み込み時に各作品のいいね数を取得
            $('.like-button').each(function() {
                var workId = $(this).data('work-id');
                var button = $(this);
                var likesCountElement = $('.likes-count[data-work-id="' + workId + '"]');
                $.ajax({
                    type: 'GET',
                    url: '/works/' + workId + '/likes', // いいね数を取得するルートを指定
                    success: function(response) {
                        if (response.likes !== undefined) {
                            likesCountElement.text('いいね数: ' + response.likes);
                            
                        }
                    }
                });
            });

            // いいねボタンのクリックハンドラを追加
            $('.like-button').click(function() {
                var workId = $(this).data('work-id');
                var button = $(this);
                var likesCountElement = $('.likes-count[data-work-id="' + workId + '"]');
                $.ajax({
                    type: 'POST',
                    url: '/works/' + workId + '/like',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        if (response.likes !== undefined) {
                            likesCountElement.text('いいね数: ' + response.likes);
                            // いいねボタンの色を変更
                            button.toggleClass('likedColor'); // likedクラスの切り替え
                        }
                    }
                });
            });
        });


    </script>
<?php $__env->stopSection(); ?>

</body>
</html>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/works/allIndex.blade.php ENDPATH**/ ?>