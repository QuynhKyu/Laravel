<?php /* D:\XAMPP\xampp\htdocs\lar.tuto\lar.tuto\authen2\resources\views/admin/content/shop/category/submit.blade.php */ ?>
<?php $__env->startSection('title'); ?>
    Thêm mới danh mục
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h1> Thêm mới danh mục </h1>

    <div class="row">
        <h3 class="title1"></h3>
        <div class="form-three widget-shadow">
            <form name="category" action="<?php echo e(url('admin/shop/category')); ?>" method="post" class="form-horizontal">
                <?php echo csrf_field(); ?> <!-- thêm token sửa lỗi 419-->
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên danh mục</label>
                    <div class="col-sm-8">
                        <input type="text" name = "name" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name = "slug" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-8">
                        <input type="text" name = "images" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>


                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
                </div>

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.glance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>