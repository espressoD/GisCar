

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3>Dashboard Admin</h3>
    <p>Selamat datang, Admin!</p>

    
    <div class="mt-4">
        <h4 class="bg-white p-3 rounded shadow-sm">Produk Terbaru</h4>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Jenis</th>
                        <th>Merk</th>
                        <th>Harga</th>
                        <th>Daerah</th>
                        <th>Koordinat</th>
                        <th>Peta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" width="100"></td>
                        <td><?php echo e($item->judul); ?></td>
                        <td><?php echo e($item->jenis); ?></td>
                        <td><?php echo e($item->merk); ?></td>
                        <td>
                            <?php
                                $harga = (int) $item->harga;
                                if ($harga >= 1000000000) {
                                    echo 'Rp' . number_format($harga / 1000000000, 1, '.', '') . 'M';
                                } elseif ($harga >= 100000000) {
                                    echo 'Rp' . number_format($harga / 1000000, 0, '.', '') . 'JT';
                                } else {
                                    echo 'Rp' . number_format($harga, 0, ',', '.');
                                }
                            ?>
                        </td>
                        <td><?php echo e($item->daerah); ?></td>
                        <td style="font-size: 13px;">
                            Lat: <?php echo e($item->Lat); ?><br>
                            Long: <?php echo e($item->Long); ?>

                        </td>
                        <td style="width: 180px;">
                            <div id="map-<?php echo e($item->id); ?>" style="height:150px; border-radius: 8px; overflow: hidden;"></div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const map = L.map('map-<?php echo e($item->id); ?>').setView([<?php echo e($item->Lat); ?>, <?php echo e($item->Long); ?>], 13);
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                                    L.marker([<?php echo e($item->Lat); ?>, <?php echo e($item->Long); ?>]).addTo(map);
                                });
                            </script>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-sm btn-outline-primary">Lihat Semua Produk</a>
    </div>

    
    <div class="mt-5">
        <h4 class="bg-white p-3 rounded shadow-sm">Seller Terbaru</h4>
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>Nama User</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($seller->user->name); ?></td>
                    <td><?php echo e($seller->company_name); ?></td>
                    <td><?php echo e($seller->company_address); ?></td>
                    <td><?php echo e($seller->phone); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua Seller</a>
    </div>

    
    <div class="mt-5">
        <h4 class="bg-white p-3 rounded shadow-sm">Pengguna Terbaru</h4>
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e(ucfirst($user->role)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua Pengguna</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GisCar\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>