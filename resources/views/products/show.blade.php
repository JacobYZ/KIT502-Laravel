@extends('layouts.app')
@section('content')
    <div class="container p-10">
        <div class="row">
            <div class="col-md-4">
                <h1 class="text-3xl font-bold">{{ $product->product_name }}</h1>
                <p class="text-lg font-bold text-gray-600">Price: ${{ $product->price }}</p>
                <p class="text-lg font-bold text-gray-600">Available: {{ $product->quantity }}</p>
                <p class="text-lg font-bold text-gray-600">Store:</p>
                @forelse ($product->storeLocation as $location)
                    <li>{{ $location->store_location }}</li>
                @empty
                    <p class="text-lg font-bold text-gray-600">No store location available</p>
                @endforelse
                <p class="text-lg font-bold text-gray-600">Companies:</p>
                @forelse ($product->company as $company)
                    <li>{{ $company->name }}</li>
                @empty
                    <p class="text-lg font-bold text-gray-600">No company available</p>
                @endforelse
                </p>
            </div>
        </div>
    </div>
@endsection
