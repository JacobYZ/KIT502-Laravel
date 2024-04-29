@extends('layouts.app')
@section('content')
    <div class="container m-10">
        <h1 class="text-3xl">Products List</h1>
        <button class="bg-cyan-500 hover:bg-cyan-600 p-2 my-1 text-white"><a href="{{ route('products.create') }}">Add
                Product</a></button>
        <hr>
        @foreach ($products as $product)
            <div class="card">
                <div class="card-body grid grid-cols-5 items-center justify-between">
                    <a class="card-title text-2xl" href="products/{{ $product->id }}">{{ $product->product_name }}</a>
                    <p class="card-text">Quantity: {{ $product->quantity }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <a href="products/{{ $product->id }}/edit"
                        class="bg-yellow-500 hover:bg-yellow-600 w-11 px-2 my-1 text-white">Edit</a>
                    <form action="{{ url('/products/' . $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 w-16 px-2 my-1 text-white">Delete</button>
                    </form>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
