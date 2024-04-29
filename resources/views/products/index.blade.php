@extends('layouts.app')
@section('content')
    <div class="container m-10">
        <h1 class="text-3xl">Products List</h1>
        <button class="bg-cyan-500 hover:bg-cyan-600 p-2 my-1 text-white"><a href="{{ route('products.create') }}">Add Product</a></button>
        <hr>
        @foreach ($products as $product)
            <div class="card">
                <div class="card-body grid grid-cols-4 items-center justify-between">
                    <h2 class="card-title text-2xl">{{ $product->product_name }}</h2>
                    <p class="card-text">Quantity: {{ $product->quantity }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
