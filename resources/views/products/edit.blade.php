@extends('layouts.app')
@section('content')
    <div class="container m-10">
        <h1 class="text-3xl">Update Product</h1>
        <form action="{{ url('/products/' . $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control border-2"
                    value="{{ $product->product_name }}">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control border-2"
                    value="{{ $product->quantity }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control border-2" step="0.01"
                    value="{{ $product->price }}">
            </div>
            <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 p-2 my-1 text-white">Submit</button>
        </form>
    </div>
@endsection
