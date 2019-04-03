<?php /* D:\XAMPP\xampp\htdocs\lar.tuto\lar.tuto\authen2\resources\views/admin/content/shop/product/index.blade.php */ ?>
<?php $__env->startSection('title'); ?>
    Quản trị sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h1> Quản trị sản phẩm </h1>

    <div style="margin: 20px 0">
        <a href="<?php echo e(url('admin/shop/product/create')); ?>" class="btn btn-success"> Thêm sản phẩm </a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số :</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Images</th>
                    <th>Giá niêm yết</th>
                    <th>Giá bán</th>
                    <th>Tồn kho</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($product->id); ?></th>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->images); ?></td>
                        <td><?php echo e($product->priceCore); ?></td>
                        <td><?php echo e($product->priceSale); ?></td>
                        <td><?php echo e($product->stock); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/shop/product/'.$product->id.'/edit')); ?>" class="btn btn-warning">Sửa</a>
                            <a href="<?php echo e(url('admin/shop/product/'.$product->id.'/delete')); ?>" class="btn btn-danger ">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($products->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.glance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>