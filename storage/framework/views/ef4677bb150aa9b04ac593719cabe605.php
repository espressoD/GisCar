
<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Register</h3>
    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Full Name" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control mb-2" required>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GisCar\resources\views/auth/register.blade.php ENDPATH**/ ?>