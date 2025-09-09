@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2>Login</h2>
    @if ($errors->has('email'))
        <div class="alert alert-error">{{ $errors->first('email') }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
@endsection
