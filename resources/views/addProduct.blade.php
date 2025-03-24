@extends("layout")

@section("sadrzajStranice")

    <form method="POST" action="{{ route('products.create') }}">
        @csrf
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
        </div>

        <div>
            <label>Ime</label>
            <input name="name" type="text" placeholder="Product name" value="{{ old('name') }}">
        </div>
        <div>
            <label>Opis</label>
            <input name="description" type="text" placeholder="Description" value="{{ old('description') }}">
        </div>
        <div>
            <label>Kolicina</label>
            <input name="amount" type="text" placeholder="Amount" {{ old('amount') }}>
        </div>
        <div>
            <label>Cena</label>
            <input name="price" type="text" placeholder="Price" {{ old('price') }}>
        </div>
        <div>
            <label>Slika</label>
            <input name="image" type="text" placeholder="Image" {{ old('image') }}>
        </div>

        <button>Add product</button>
    </form>

@endsection
