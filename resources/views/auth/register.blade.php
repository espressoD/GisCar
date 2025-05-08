@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Register</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Full Name" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control mb-2" required>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
</div>
@endsection