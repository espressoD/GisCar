@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container-profile">
        <h3>Profil Saya</h3>
        <p>Nama: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Role: {{ Auth::user()->role }}</p>

        @if(!Auth::user()->is_seller)
            <a href="{{ route('seller.register') }}" class="btn btn-outline-primary">Daftar Sebagai Penjual</a>
        @else
            <p><strong>Perusahaan:</strong> {{ Auth::user()->seller->company_name ?? 'N/A' }}</p>
        @endif
    </div>
</div>
@endsection