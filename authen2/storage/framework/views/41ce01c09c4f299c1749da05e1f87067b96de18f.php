<?php /* D:\XAMPP\xampp\htdocs\lar.tuto\lar.tuto\authen2\resources\views/admin/content/shop/category/index.blade.php */ ?>
<?php $__env->startSection('title'); ?>
    Quản trị danh mục sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h1> Quản trị danh mục sản phẩm </h1>
    <div style="margin: 20px 0">
        <a href="<?php echo e(url('admin/shop/category/create')); ?>" class="btn btn-success"> Thêm danh mục </a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số :</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($cat->id); ?></th>
                        <td><?php echo e($cat->name); ?></td>
                        <td><?php echo e($cat->slug); ?></td>
                        <td><?php echo e($cat->images); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/shop/category/'.$cat->id.'/edit')); ?>" class="btn btn-warning">Sửa</a>
                            <a href="<?php echo e(url('admin/shop/category/'.$cat->id.'/delete')); ?>" class="btn btn-danger ">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($cats->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.glance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>