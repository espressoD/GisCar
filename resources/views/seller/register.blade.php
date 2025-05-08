@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Form Pendaftaran Penjual</h3>
    <form method="POST" action="{{ route('seller.register') }}">
        @csrf
        <input type="text" name="company_name" placeholder="Nama Perusahaan" class="form-control mb-2" required>
        <input type="text" name="company_address" placeholder="Alamat Perusahaan" class="form-control mb-2">
        <input type="text" name="phone" placeholder="No. Telepon" class="form-control mb-2">
        <button type="submit" class="btn btn-success">Daftar Sebagai Penjual</button>
    </form>
</div>
@endsection
