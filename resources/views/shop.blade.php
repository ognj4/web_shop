@extends('layout')
@section('naslovStranice')
    Shop strana
@endsection
@section('sadrzajStranice')

    @foreach($products as $singleProduct)

        <p>{{ $singleProduct }}</p>

    @endforeach

@endsection
