<header>
    <style>
        /* スタイルを追加してカーソルをポインタに変更 */
        #h_logo {
            cursor: pointer;
        }
    </style>


    <div >
        <img src="<?php echo e(asset('img/logo.png')); ?>" class="img-fluid" id="h_logo" alt="">
    </div>
</header>

<script>
    $(document).ready(function() {
        $("#h_logo").click(function() {
            // 投稿するボタンがクリックされたときの処理
            window.location.href = "<?php echo e(route('main')); ?>";
        });
    });
</script><?php /**PATH C:\xampp\htdocs\hoikuWorks\resources\views/works/header.blade.php ENDPATH**/ ?>