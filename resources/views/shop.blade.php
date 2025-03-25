@extends("layout")

@section('naslovStranice')
    Prodavnica
@endsection

@section('sadrzajStranice')


    @foreach( $products as $product)

        <p>{{$product->name}} </p>
        <p>{{$product->description}}</p>
        <a href="{{ route ('products.permalink', ['product' => $product->id]) }}">Detaljnije</a>

    @endforeach

@endsection
