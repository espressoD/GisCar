
<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Tambah Produk</h3>

    <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Jenis</label>
                    <input type="text" name="jenis" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Merk</label>
                    <input type="text" name="merk" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Daerah</label>
                    <input type="text" name="daerah" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Kontak</label>
                    <input type="text" name="kontak" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required></textarea>
                </div>
                <div class="mb-2">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-2">
                    <label>Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Search Lokasi</label>
                    <div class="input-group">
                        <input type="text" id="search-map" list="suggestions" placeholder="Cari alamat..." class="form-control" oninput="fetchSuggestions()">
                        <datalist id="suggestions"></datalist>
                        <button type="button" onclick="searchSelected()" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <div class="mb-2">
                    <label>Map</label>
                    <div id="map" style="height: 300px;"></div>
                </div>
                <input type="hidden" id="Lat" name="Lat" value="<?php echo e(old('Lat', $product->Lat ?? '')); ?>">
                <input type="hidden" id="Long" name="Long" value="<?php echo e(old('Long', $product->Long ?? '')); ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    const map = L.map('map').setView([-6.2, 106.8], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    let marker = null;
    let searchResults = [];

    function setMarker(lat, lng) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker([lat, lng]).addTo(map);
        document.getElementById('Lat').value = lat;
        document.getElementById('Long').value = lng;
    }

    map.on('click', function (e) {
        const { lat, lng } = e.latlng;
        setMarker(lat, lng);
    });

    function fetchSuggestions() {
        const query = document.getElementById('search-map').value;
        if (query.length > 2) { 
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
                .then(res => res.json())
                .then(data => {
                    const suggestions = document.getElementById('suggestions');
                    suggestions.innerHTML = ''; 
                    searchResults = data;

                    data.forEach((item, index) => {
                        const option = document.createElement('option');
                        option.value = item.display_name;
                        option.dataset.index = index;
                        suggestions.appendChild(option);
                    });
                });
        }
    }

    function searchSelected() {
        const query = document.getElementById('search-map').value;
        const match = searchResults.find(item => item.display_name === query);
        if (match) {
            const lat = match.lat;
            const lon = match.lon;
            setMarker(lat, lon);
            map.setView([lat, lon], 15);
        } else {
            alert('Alamat tidak ditemukan, pilih dari saran yang muncul.');
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GisCar\resources\views/admin/products/create.blade.php ENDPATH**/ ?>