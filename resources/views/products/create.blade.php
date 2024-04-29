@extends('layouts.app')
@section('content')
    <div class="container m-10">
        <h1 class="text-3xl">Add Product</h1>
        <form action="{{ url("/products") }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01">
            </div>
            <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 p-2 my-1 text-white">Add Product</button>
        </form>
    </div>
@endsection
