@extends('layouts.app')
@section('content')
    <div class="container m-10">
        <h1 class="text-3xl">Add Product</h1>
        <form action="{{ url('/products') }}" method="POST">
            @csrf
            <div class="form-group flex flex-col">
                <label for="product_name">Product Name</label>
                @if ($errors->has('product_name'))
                    <p class="text-red-500">{{ $errors->first('product_name') }}</p>
                @endif
                <input type="text" name="product_name" id="product_name" class="form-control border-2">
            </div>
            <div class="form-group flex flex-col">
                <label for="quantity">Quantity</label>
                @if ($errors->has('quantity'))
                    <p class="text-red-500">{{ $errors->first('quantity') }}</p>
                @endif
                <input type="number" name="quantity" id="quantity" class="form-control border-2">
            </div>
            <div class="form-group flex flex-col">
                <label for="price">Price</label>
                @if ($errors->has('price'))
                    <p class="text-red-500">{{ $errors->first('price') }}</p>
                @endif
                <input type="number" name="price" id="price" class="form-control border-2" step="0.01">
            </div>
            <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 p-2 my-1 text-white">Add Product</button>
        </form>
    </div>
@endsection
