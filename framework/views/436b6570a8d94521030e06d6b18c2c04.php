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


<?php $__env->startSection('content'); ?>
    
<body>

<div class="container">

    <div class="header">
        <?php echo $__env->make('works.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="position-relative">
        <img src="<?php echo e(asset('img/footer.png')); ?>" class="img-fluid" alt="">

        <div class="position-absolute top-50 start-50 translate-middle text-center">
    
                <button type="button" class="btn  btn-info btn-lg custom-button" style="width:400px; margin-bottom:50px" id="mySearchButton">自分の投稿を見る</button>
                <br>
                <button type="button" class="btn  btn-warning  btn-lg custom-button" style="width:400px" id="allSearchButton">みんなの投稿を見る</button>
                
            <!-- キーワード検索 -->
            <form method="POST" action="<?php echo e(route('searchIndex')); ?>">
                <?php echo csrf_field(); ?>
                <table  class="searchBar">
                    <tr>
                        <td>
                            <div class="form-group">
                                
                                <select name="season_id" class="form-control">
                                    <option value="">すべての季節</option>
                                    <option value="春">春</option>
                                    <option value="夏">夏</option>
                                    <option value="秋">秋</option>
                                    <option value="冬">冬</option>
                                </select>
                            </div>
                        </td>
                    
                        <td>
                            <div class="form-group">
                                <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力">
                            </div>
                        </td>

                        <td>
                            <button type="submit" class="btn btn-primary">検索</button>
                        </td>

                    </tr>
                </table>
            </form>
        
        </div>

    </div>
</div>
</body>
    
</div>


    <script>
        $(document).ready(function() {
            $("#mySearchButton").click(function() {
                // 投稿するボタンがクリックされたときの処理
                window.location.href = "<?php echo e(route('myIndex')); ?>";
            });
        });

        $(document).ready(function() {
            $("#allSearchButton").click(function() {
                // 投稿するボタンがクリックされたときの処理
                window.location.href = "<?php echo e(route('allIndex')); ?>";
            });
        });

    </script>
<?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/works/search.blade.php ENDPATH**/ ?>