<?php /* D:\XAMPP\xampp\htdocs\lar.tuto\lar.tuto\authen2\resources\views/admin/content/shop/product/delete.blade.php */ ?>
<?php $__env->startSection('title'); ?>
    Xóa snr phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h1> Xóa sản phẩm <?php echo e($product->id .' : '. $product->name); ?> </h1>

    <div class="row">
        <h3 class="title1"></h3>
        <div class="form-three widget-shadow">
            <form name="category" action="<?php echo e(url('admin/shop/product/'.$product->id.'/delete')); ?>" method="post" class="form-horizontal">
            <?php echo csrf_field(); ?> <!-- thêm token sửa lỗi 419-->

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>

            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.glance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>