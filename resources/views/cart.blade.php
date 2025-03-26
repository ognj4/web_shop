@extends('layout')
@section('naslovStranice')
    Cart strana
@endsection
@section('sadrzajStranice')
    <p>Shopping cart</p>

    @foreach($combinedItems as $item )

                <p> {{$item['name']}} </p>
                <p> {{$item['amount']}} </p>
                <p> {{$item['price']}} </p>
                <p> {{$item['total']}} </p>

    @endforeach

@endsection
