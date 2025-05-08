@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Dashboard Admin</h3>
    <p>Selamat datang, Admin!</p>

    {{-- Produk Terbaru --}}
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
                    @foreach ($produk as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" width="100"></td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->merk }}</td>
                        <td>
                            @php
                                $harga = (int) $item->harga;
                                if ($harga >= 1000000000) {
                                    echo 'Rp' . number_format($harga / 1000000000, 1, '.', '') . 'M';
                                } elseif ($harga >= 100000000) {
                                    echo 'Rp' . number_format($harga / 1000000, 0, '.', '') . 'JT';
                                } else {
                                    echo 'Rp' . number_format($harga, 0, ',', '.');
                                }
                            @endphp
                        </td>
                        <td>{{ $item->daerah }}</td>
                        <td style="font-size: 13px;">
                            Lat: {{ $item->Lat }}<br>
                            Long: {{ $item->Long }}
                        </td>
                        <td style="width: 180px;">
                            <div id="map-{{ $item->id }}" style="height:150px; border-radius: 8px; overflow: hidden;"></div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const map = L.map('map-{{ $item->id }}').setView([{{ $item->Lat }}, {{ $item->Long }}], 13);
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                                    L.marker([{{ $item->Lat }}, {{ $item->Long }}]).addTo(map);
                                });
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua Produk</a>
    </div>

    {{-- Seller Terbaru --}}
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
                @foreach ($sellers as $seller)
                <tr>
                    <td>{{ $seller->user->name }}</td>
                    <td>{{ $seller->company_name }}</td>
                    <td>{{ $seller->company_address }}</td>
                    <td>{{ $seller->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua Seller</a>
    </div>

    {{-- Pengguna Terbaru --}}
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
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua Pengguna</a>
    </div>
</div>
@endsection
