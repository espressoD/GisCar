
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="container-profile">
        <h3>Profil Saya</h3>
        <p>Nama: <?php echo e(Auth::user()->name); ?></p>
        <p>Email: <?php echo e(Auth::user()->email); ?></p>
        <p>Role: <?php echo e(Auth::user()->role); ?></p>

        <?php if(!Auth::user()->is_seller): ?>
            <a href="<?php echo e(route('seller.register')); ?>" class="btn btn-outline-primary">Daftar Sebagai Penjual</a>
        <?php else: ?>
            <p><strong>Perusahaan:</strong> <?php echo e(Auth::user()->seller->company_name ?? 'N/A'); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GisCar\resources\views/profile.blade.php ENDPATH**/ ?>