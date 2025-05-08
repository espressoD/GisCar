@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Data Produk</h3>

    <form action="{{ route('admin.products.destroySelected') }}" method="POST">
        @csrf
        @method('DELETE')

        <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Tambah Produk</a>
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
                    @foreach ($products as $product)
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="{{ $product->id }}"></td>
                        <td><img src="{{ asset('storage/' . $product->gambar) }}" width="80"></td>
                        <td>{{ $product->judul }}</td>
                        <td>{{ $product->jenis }}</td>
                        <td>{{ $product->merk }}</td>
                        <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td>{{ $product->daerah }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </form>
    <div class="pagination-container">
        <div class="pagination-wrapper">
            {{ $products->links() }}
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
@endsection
