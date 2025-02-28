@extends("layout")

@section('naslovStranice')
    Prodavnica
@endsection

@section('sadrzajStranice')


    @foreach( $products as $product)

        <p>{{$product->name}} - {{$product->description}}</p>

    @endforeach

@endsection
