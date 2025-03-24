@extends('layout')
@section('naslovStranice')
    Dashboard strana
@endsection
@section('sadrzajStranice')
    <p>{{ $trenutnoVreme }}</p>

    @foreach($products as $singleProduct)
        <p>{{ $singleProduct->name }} - {{ $singleProduct->price }}</p>
    @endforeach

    <form method="POST" action="{{ route('sendContact') }}">
        @if($errors->any())
            <p>Greska: {{$errors->first()}} </p>
        @endif

        @csrf
        <input type="email" name="email" placeholder="Unesi email">
        <input type="text" name="subject" placeholder="Unesi naslov poruke">
        <textarea name="description" placeholder="Opis"></textarea>
        <button>Posalji poruku</button>
    </form>

@endsection

