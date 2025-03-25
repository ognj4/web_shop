@extends('layout')
@section('naslovStranice')
    Permalink
@endsection
@section('sadrzajStranice')
    <p>{{ $product->name }}</p>
    <form method="POST" action="{{ route('cart.add') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="text" name="amount" placeholder="Enter amount">
        <button>Add to cart</button>
    </form>
@endsection
