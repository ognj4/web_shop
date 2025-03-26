@extends('layout')
@section('naslovStranice')
    Cart strana
@endsection
@section('sadrzajStranice')
    <p>Shopping cart</p>

    @foreach($cart as $product )
        <p> {{$product['product_id']}} -> {{$product['amount']}}</p>
    @endforeach
@endsection
