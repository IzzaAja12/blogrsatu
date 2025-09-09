@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Selamat datang, {{ Auth::user()->name }}!</h2>
    <p>Role: {{ Auth::user()->role }}</p>
@endsection
