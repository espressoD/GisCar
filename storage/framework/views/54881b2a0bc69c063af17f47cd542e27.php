
<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Data Produk</h3>

    <form action="<?php echo e(route('admin.products.destroySelected')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-success mb-3">Tambah Produk</a>
        <button type="submit" class="btn btn-danger mb-3">Hapus yang Dipilih</button>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Jenis</th>
                        <th>Merk</th>
                        <th>Harga</th>
                        <th>Daerah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?php echo e($product->id); ?>"></td>
                        <td><img src="<?php echo e(asset('storage/' . $product->gambar)); ?>" width="80"></td>
                        <td><?php echo e($product->judul); ?></td>
                        <td><?php echo e($product->jenis); ?></td>
                        <td><?php echo e($product->merk); ?></td>
                        <td>Rp <?php echo e(number_format($product->harga, 0, ',', '.')); ?></td>
                        <td><?php echo e($product->daerah); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table> 
        </div>
    </form>
    <div class="pagination-container">
        <div class="pagination-wrapper">
            <?php echo e($products->links()); ?>

        </div>
    </div>    
</div>

<script>
    document.getElementById('select-all').addEventListener('click', function(e) {
        const checkboxes = document.querySelectorAll('input[name="selected[]"]');
        checkboxes.forEach(cb => cb.checked = e.target.checked);
    });

    document.addEventListener('DOMContentLoaded', function () {
        const prevLink = document.querySelector('.pagination li:first-child a, .pagination li:first-child span');
        const nextLink = document.querySelector('.pagination li:last-child a, .pagination li:last-child span');
        
        if (prevLink) {
            prevLink.innerHTML = '<i class="fa fa-chevron-left"></i>';
        }
        if (nextLink) {
            nextLink.innerHTML = '<i class="fa fa-chevron-right"></i>';
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GisCar\resources\views/admin/products/index.blade.php ENDPATH**/ ?>