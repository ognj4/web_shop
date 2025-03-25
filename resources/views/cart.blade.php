@extends('layout')
@section('naslovStranice')
    Cart strana
@endsection
@section('sadrzajStranice')
    <p>Shopping cart</p>

    @foreach($cart as $product => $amount )
        {{ $product .' '. $amount }}
    @endforeach
@endsection
