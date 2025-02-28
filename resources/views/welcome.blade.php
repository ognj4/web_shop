@extends('layout')
@section('naslovStranice')
    Home strana
@endsection
@section('sadrzajStranice')
    <p>{{ $trenutnoVreme }}</p>

    @foreach($products as $singleProduct)
        <p>{{ $singleProduct->name }} - {{ $singleProduct->price }}</p>
    @endforeach


@endsection

