@extends('layout')

@section('sadrzajStranice')

    <form method="POST" action="{{ route('product.save',['id'=>$product->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input value="{{$product->name}}" type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input value="{{$product->description}}" type="text" name="description" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input value="{{$product->price}}" type="text" name="price" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input value="{{$product->amount}}" type="text" name="amount" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
