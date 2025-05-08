

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Form Pendaftaran Penjual</h3>
    <form method="POST" action="<?php echo e(route('seller.register')); ?>">
        <?php echo csrf_field(); ?>
        <input type="text" name="company_name" placeholder="Nama Perusahaan" class="form-control mb-2" required>
        <input type="text" name="company_address" placeholder="Alamat Perusahaan" class="form-control mb-2">
        <input type="text" name="phone" placeholder="No. Telepon" class="form-control mb-2">
        <button type="submit" class="btn btn-success">Daftar Sebagai Penjual</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GisCar\resources\views/seller/register.blade.php ENDPATH**/ ?>